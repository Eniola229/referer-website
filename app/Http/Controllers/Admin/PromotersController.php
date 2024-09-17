<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Waitlist;
use App\Models\Payment;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;

class PromotersController extends Controller
{
    public function view()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $usersCount = User::all()->count();
        if (Auth::guard('admins')->check()) {
           return view('admin.admin-promoters', compact('users', 'usersCount'));
        }
    }
    public function waitlist()
    {
        $users = Waitlist::orderBy('created_at', 'desc')->get();
        $usersCount = Waitlist::all()->count();
        if (Auth::guard('admins')->check()) {
           return view('admin.admin-waitlist', compact('users', 'usersCount'));
        }
    }


    public function promoters($id)
    {

        // Fetch the user (user) by id
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Promoter not found');
        }
        
         $user = User::where('id', $id)->firstOrFail();
         $referers = Waitlist::where('referer', $user->unique_id)->get();
         $referersCount = Waitlist::where('referer', $user->unique_id)->count();
         $payments = Payment::where('user_id', $user->id)->get();
         $account = Withdraw::where('user_id', $user->id)->firstOrFail();

        // Return view with student data and additional info
       if (Auth::guard('admins')->check()) {
           return view('admin.admin-promoters-info', compact('user', 'referersCount', 'referers', 'payments', 'account'));
        }
    }

    public function destroy(Request $request)
    {
        // Validate that 'user_id' is present in the request
        $request->validate([
            'user_id' => 'required|exists:waitlists,id',
        ]);

        // Find the user by ID
        $user = Waitlist::find($request->input('user_id'));

        if (!$user) {
            return redirect()->back()->with('error', 'Waitlist not found.');
        }

        // Delete the user
        $user->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Waitlist deleted successfully.');
    }

}
