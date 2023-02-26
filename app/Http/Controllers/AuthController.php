<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Services\AuthService;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use UploadImageTrait;
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
            return redirect()->route('verifyEmailPage');

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
