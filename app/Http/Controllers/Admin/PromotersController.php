<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Waitlist;
use Illuminate\Support\Facades\Auth;

class PromotersController extends Controller
{
    public function view()
    {
        $users = User::all();
        $usersCount = User::all()->count();
        if (Auth::guard('admins')->check()) {
           return view('admin.admin-promoters', compact('users', 'usersCount'));
        }
    }
    public function waitlist()
    {
        $users = Waitlist::all();
        $usersCount = Waitlist::all()->count();
        if (Auth::guard('admins')->check()) {
           return view('admin.admin-waitlist', compact('users', 'usersCount'));
        }
    }
}
