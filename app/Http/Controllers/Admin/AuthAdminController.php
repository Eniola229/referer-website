<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Admin;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Waitlist;

class AuthAdminController extends Controller
{
    /**
     * Show the login page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.login');
    }  

    /**
     * Show the registration page.
     *
     * @return View
     */
    public function registration(): View
    {
        return view('admin.registration');
    }

    /**
     * Handle login request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        // Use the 'admins' guard for authentication
        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect()->intended('admin-dashboard')
                        ->withSuccess('You have successfully logged in');
        }

        return redirect("admin-login")->withError('Oops! You have entered invalid credentials');
    }

    /**
     * Handle registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins', // Check against admins table
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $admin = $this->create($data);

        Auth::guard('admins')->login($admin);

        return redirect("admin-dashboard")->withSuccess('Great! You have successfully registered and logged in');
    }

    /**
     * Show the admin dashboard.
     *
     * @return View|RedirectResponse
     */
    public function dashboard()
    {
        $users = User::all();
        $waitlistCount = Waitlist::all()->count();
        $usersCount = User::all()->count();
         $totalBalance = User::sum('balance');

        if (Auth::guard('admins')->check()) {
            return view('admin.admin-dashboard', compact("users", 'totalBalance', 'usersCount','waitlistCount'));
        }

        return redirect("admin-login")->withSuccess('Oops! You do not have access');
    }

    /**
     * Create a new admin instance.
     *
     * @param array $data
     * @return Admin
     */
    public function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle admin logout.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::guard('admins')->logout();

        return redirect('admin-login');
    }
}
