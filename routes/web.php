<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoterController;
//WAITLIST
use App\Http\Controllers\Waitlist\WaitlistController;
//ROMOTERS
use App\Http\Controllers\Promoter\WithdrawController;
use App\Http\Controllers\Promoter\DashboardController;
use App\Http\Controllers\Promoter\RefererController;
use App\Http\Controllers\Promoter\PrivacyController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


//OPEN ROUTE
Route::get('promoters', [PromoterController::class, 'view']);
Route::post('waitlist', [WaitlistController::class, 'store'])->name('waitlist');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'view'])->name('dashboard');
    //WITHDRAW
    Route::get('withdraws', [WithdrawController::class, 'view'])->name('withdraws-show');
    Route::post('withdraws', [WithdrawController::class, 'store'])->name('withdraws-store');   
    Route::put('withdraws-update', [WithdrawController::class, 'requestpayment'])->name('request-payment');   
    //REFERER
    Route::get('referers', [RefererController::class, 'view'])->name('referers');
    //PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //POLICY
     Route::get('policy', [PrivacyController::class, 'view'])->name('policy');
});

require __DIR__.'/auth.php';
