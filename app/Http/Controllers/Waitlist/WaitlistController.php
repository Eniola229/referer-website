<?php

namespace App\Http\Controllers\Waitlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\EmailValidator;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Waitlist;
class WaitlistController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data using Laravel's validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
            'required',
            'email',
            'max:255',
            function ($attribute, $value, $fail) {
                // Check in the waitlists table
                if (Waitlist::where('email', $value)->exists()) {
                    return $fail('The email has already been taken in the waitlist.');
                }
                // Check in the users table
                if (User::where('email', $value)->exists()) {
                    return $fail('The email has already been taken in the promoters.');
                }
            }
        ],
            'referer' => 'nullable|string|exists:users,unique_id',
        ]);

        // Check if Laravel's validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Use Egulias/EmailValidator to perform DNS check on email
        $emailValidator = new EmailValidator();
        $isValid = $emailValidator->isValid($request->email, new DNSCheckValidation());

        // If the email's domain is invalid
        if (!$isValid) {
            return redirect()->back()->withErrors(['email' => 'The email domain is invalid or unreachable.'])->withInput();
        }

        // Create and store the user in the waitlist
        $user = Waitlist::create([
            'name' => $request->name,
            'email' => $request->email,
            'referer' => $request->referer,
        ]);

        // If there is a referer, update the referer's balance
        if (!empty($user->referer)) {
            $refererUser = User::where('unique_id', $request->referer)->firstOrFail();
            $refererUser->balance += 50.0;
            $refererUser->save();
        }

        // Redirect or return success message
        return redirect()->back()->with('success', 'Waitlist successfully registered!');
    }
}

