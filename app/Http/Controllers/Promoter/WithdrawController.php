<?php

namespace App\Http\Controllers\Promoter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Waitlist;
use App\Models\RequestMoney;
use App\Models\User;


class WithdrawController extends Controller
{
      public function view()
    {
        $userId = auth()->user()->id;
        $withdraw = Withdraw::where('user_id', $userId)->first();
        $payments = Payment::where('user_id', $userId)->get();
        $referer = auth()->user()->unique_id;
        $referers = Waitlist::where('referer', $referer)->get();
        $referersCount = Waitlist::where('referer', $referer)->count();
        $balance = auth()->user()->balance;

        $request = RequestMoney::where('user_id', $userId)->first();

        return view('withdraws', compact('withdraw', 'payments', 'referers', 'referersCount', 'balance', 'request'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|max:15|unique:withdraws,account_number', 
            'bank_name' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create and store the user
        $user = Withdraw::updateOrCreate([
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'user_id' => Auth::user()->id,
        ]);

        // Redirect or return success message
        return redirect()->back()->with('success', 'Account Detials successfully added!');
    }

    public function requestPayment(Request $request)
    {
        // Validate request input
        $request->validate([
            'userId' => 'required|exists:users,id',
        ]);

        // Update or create a request record for the authenticated user
        $userRequest = RequestMoney::create([
            'user_id' => Auth::id(),
        ]);

        // Get the referer user and check if balance is sufficient
        $refererUser = User::findOrFail($request->userId);
        
        if ($refererUser->balance >= 1000.0) {
            // Deduct the amount from the referer user's balance
            $refererUser->balance -= 1000.0;
            $refererUser->save();
            
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Request successfully sent! Your money is on its way.');
        } else {
            // Redirect back with an error message if balance is insufficient
            return redirect()->back()->with('error', 'Insufficient balance. Unable to process request.');
        }
    }

}
