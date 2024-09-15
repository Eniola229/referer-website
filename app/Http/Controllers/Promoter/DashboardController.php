<?php

namespace App\Http\Controllers\Promoter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waitlist;

class DashboardController extends Controller
{
    public function view()
    {
        $userId = auth()->user()->id;
        $referer = auth()->user()->unique_id;
        $referers = Waitlist::where('referer', $referer)->get();
        $referersCount = Waitlist::where('referer', $referer)->count();
        $balance = auth()->user()->balance;
        return view('dashboard', compact('referers', 'referersCount', 'balance'));
    }
}
