<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\VerifyOtpRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected AuthService $authService;
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }


    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->authService->register($request->validated());
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }

        return redirect()->route('verifyEmail');
    }


    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            if ($this->authService->login($request->validated())) {
                return redirect()->route('dashboard');
            }
            return redirect()->back()->withErrors(['password' => "Invalid Password"]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function logout(LoginRequest $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function verifyEmailPage()
    {
        return view('auth.verify-otp');
    }
    public function verifyEmail(VerifyOtpRequest $request)
    {
        try {
            $this->authService->verifyOtp($request->validated());
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
        return redirect()->route('setPin');
    }
}
