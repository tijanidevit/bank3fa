<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User as AuthUser;
/**
 * Class UserOtpService.
 */
class UserOtpService
{
    protected AuthUser $user;

    public function __construct(AuthUser $user) {
        $this->user = $user;
    }
}
