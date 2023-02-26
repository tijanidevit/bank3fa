<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function created(User $user)
    {
        $user->otp()->create(['otp' => Str::random(6)]);
        $user->wallet()->create(['account_number' => rand(1111111111,9999999999)]);
    }

}
