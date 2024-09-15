<?php

namespace App\Http\Controllers\Waitlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waitlist;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class WaitlistController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:waitlists,email', 
          'referer' => 'nullable|string|exists:users,unique_id',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create and store the user
        $user = Waitlist::create([
            'name' => $request->name,
            'email' => $request->email,
            'referer' => $request->referer,
        ]);

       if (!empty($user->referer)) {
        $refererUser = User::where('unique_id', $request->referer)->firstOrFail();
        $refererUser->balance += 30.0;
        $refererUser->save();
        }


        // Redirect or return success message
        return redirect()->back()->with('success', 'Waitlist successfully registered!');
    }
}

