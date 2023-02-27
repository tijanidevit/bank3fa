<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\SetPinRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\VerifyOtpRequest;
use App\Http\Requests\User\SetQuestionRequest;

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

    public function logout()
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


    public function setQuestionPage()
    {
        return view('auth.set-question');
    }
    public function setQuestion(SetQuestionRequest $request)
    {
        try {
            $this->authService->SetQuestion($request->validated());
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
        return redirect()->route('dashboard');
    }



    public function setPinPage()
    {
        return view('auth.set-pin');
    }
    public function setPin(SetPinRequest $request)
    {
        try {
            $this->authService->SetPin($request->validated());
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
        return redirect()->route('setQuestion');
    }
}
