<?php

namespace App\Services;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthService
{
    use UploadImageTrait;
    public function register(array $data)
    {
        DB::transaction(function () use($data)
        {
            $data['image'] = $this->uploadImage($data['image'], 'users');
            $user = User::create($data);
            $this->createUserOTP($user);
            $this->createUserWallet($user);
            UserRegistered::dispatch($user);
            Auth::login($user);
        });
    }

    public function createUserOTP(User $user)
    {
        $user->otp()->create(['otp' => Str::random(6)]);
    }
    public function createUserWallet(User $user)
    {
        $user->wallet()->create(['account_number' => rand(1111111111,9999999999)]);
    }


}
