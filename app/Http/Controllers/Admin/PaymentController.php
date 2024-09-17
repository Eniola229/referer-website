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

           $payments = Payment::with('user')->get();

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

            // Generate a random reference code
            $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $randomLetters = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4));
            $referenceCode = "BANK-{$randomDigits}-{$randomLetters}";

            // Handle Cloudinary image upload
            // Uncomment this section when you're ready to process the receipt upload
            // if ($request->hasFile('receipt')) {
            //     $uploadCloudinary = cloudinary()->upload( 
            //         $request->file('receipt')->getRealPath(),
            //         [
            //             'folder' => 'africtv/referer/payment',
            //             'resource_type' => 'auto',
            //             'transformation' => [
            //                 'quality' => 'auto',
            //                 'fetch_format' => 'auto'
            //             ]
            //         ]
            //     );

            //     $imageUrl = $uploadCloudinary->getSecurePath();
            //     $imageId = $uploadCloudinary->getPublicId();
            // } else {
            //     return redirect()->back()->with('error', 'Receipt upload failed.');
            // }

            // Placeholder values for receipt (remove when ready for Cloudinary)
            $imageUrl = "Success";
            $imageId = "Success";

            // Payment status
            $status = "PAID";

            // Create a new payment entry
            $payment = Payment::create([
                'user_id' => $request->input('user_id'),
                'amount' => $request->input('amount'),
                'account_number' => $request->input('account_number'),
                'reference_code' => $referenceCode,
                'status' => $status,
                'reciept' => $imageUrl,
                'recieptId' => $imageId,
            ]);

            // Delete previous RequestMoney records for the user if they exist
            RequestMoney::where('user_id', $request->input('user_id'))->delete();

            // Redirect to the request money index page with a success message
            return redirect()->back()->with('success', 'RequestMoney record and proof sent created successfully.');
        }


}
