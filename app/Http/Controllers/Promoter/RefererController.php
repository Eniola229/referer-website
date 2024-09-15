<?php

namespace App\Http\Controllers\Promoter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Waitlist;

class RefererController extends Controller
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

        return view('referers', compact('withdraw', 'payments', 'referers', 'referersCount', 'balance'));
    }

}
