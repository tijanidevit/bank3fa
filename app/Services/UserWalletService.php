<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User as AuthUser;
/**
 * Class UserWalletService.
 */
class UserWalletService
{

    protected AuthUser $user;

    public function __construct(AuthUser $user) {
        $this->user = $user;
    }
}
