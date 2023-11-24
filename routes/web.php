<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'signin'])->name('signin');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ------------------------------ register ---------------------------------//
Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('signup');

Route::get('/verify-otp', [App\Http\Controllers\Auth\RegisterController::class, 'showVerifyForm'])->name('otp');
Route::post('/verify-otp', [App\Http\Controllers\Auth\RegisterController::class, 'verifyOTP'])->name('verify.otp');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');
    Route::get('/history', [App\Http\Controllers\HomeController::class, 'history'])->name('history');

    Route::get('/account', [App\Http\Controllers\AccountController::class, 'show'])->name('account');
    Route::post('/account/general-information', [App\Http\Controllers\AccountController::class, 'updateGeneralInformation'])->name('account.general');
    Route::post('/account/auth-information', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('account.auth');

    Route::get('/wallet', [App\Http\Controllers\WalletController::class, 'index'])->name('wallet');

    Route::get('/deposit', [App\Http\Controllers\API\FreshPayController::class, 'deposit_form'])->name('deposit.form');
    Route::post('/deposit', [App\Http\Controllers\API\FreshPayController::class, 'deposit_request'])->name('deposit.request');

    Route::get('/send-money', [App\Http\Controllers\API\FreshPayController::class, 'send_money_form'])->name('send.money.form');
    Route::post('/send-money', [App\Http\Controllers\API\FreshPayController::class, 'send_money_request'])->name('send.money.request');

    Route::get('/withdraw', [App\Http\Controllers\API\FreshPayController::class, 'withdraw_form'])->name('withdraw.form');
    Route::post('/withdraw', [App\Http\Controllers\API\FreshPayController::class, 'withdraw_request'])->name('withdraw.request');
});
