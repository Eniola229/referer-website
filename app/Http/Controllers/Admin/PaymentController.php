<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\RequestMoney;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PaymentController extends Controller
{
        public function view()
        {
            $requests = RequestMoney::with(['user', 'withdraw'])->get();
            $requestsCount = RequestMoney::all()->count();

            $payments = Payment::all();

            if (Auth::guard('admins')->check()) {
               return view('admin.admin-payment', compact('payments', 'requestsCount', 'requests'));
            }
        }

        public function payment(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1000',
            'account_number' => 'required|string',
            'receipt' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Generate a random four-digit number
        $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        // Generate a random four-letter string
        $randomLetters = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4));
        // Combine them into the desired format
        $referenceCode = "BANK-{$randomDigits}-{$randomLetters}";


    

         if ($request->hasFile('receipt')) {
            try {
                $uploadedFile = $request->file('receipt')->getRealPath();
                $uploadCloudinary = cloudinary()->upload(
                    $uploadedFile,
                    [
                        'folder' => 'africtv/referers/receipts',
                        'resource_type' => 'auto',
                        'transformation' => [
                            'quality' => 'auto',
                            'fetch_format' => 'auto'
                        ]
                    ]
                );

                // Log the response
                \Log::info('Cloudinary Upload Response:', $uploadCloudinary->getArrayCopy());

                $receiptUrl = $uploadCloudinary->getSecurePath();
                $publicId = $uploadCloudinary->getPublicId();

            } catch (\Exception $e) {
                \Log::error('Cloudinary Upload Error:', ['error' => $e->getMessage()]);
                return redirect()->back()->withErrors(['upload_error' => 'Failed to upload receipt. Please try again.'])->withInput();
            }
        }


        $status = "PAID"; // Fixed typo

        // Delete previous records if they exist
        RequestMoney::where('user_id', $request->user_id)->delete();

        // Create a new RequestMoney record
        try {
            $requestMoney = Payment::create([
                'user_id' => $request->input('user_id'),
                'amount' => $request->input('amount'),
                'account_number' => $request->input('account_number'),
                'reference_code' => $referenceCode,
                'status' => $status, // Fixed typo
                'receipt' => $receiptUrl,
                'receiptId' => $publicId,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['database_error' => 'Failed to create payment record. Please try again.'])->withInput();
        }

        return redirect()->route('requestmoney.index')->with('success', 'RequestMoney record created successfully.');
    }


}
