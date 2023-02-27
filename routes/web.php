<?php

use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::group(['middleware' => 'userNotAuth'], function ()
{
    Route::get('register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('registerAction');

    Route::get('login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('loginAction');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth.user','userNotVerified']], function ()
{
    Route::get('email-verification', [AuthController::class, 'verifyEmailPage'])->name('verifyEmail');
    Route::post('email-verification', [AuthController::class, 'verifyEmail'])->name('verifyEmailAction');
});

Route::group(['middleware' => ['auth.user','verify.user','userNotSetPin']], function ()
{
    Route::get('set-pin', [AuthController::class, 'setPinPage'])->name('setPin');
    Route::post('set-pin', [AuthController::class, 'setPin'])->name('setPinAction');
});



Route::group(['middleware' => ['auth.user','verify.user','pin.user','question.user']], function ()
{
    Route::get('dashboard',function ()
    {
        echo "in dashboard";
    })->name('dashboard');
});
