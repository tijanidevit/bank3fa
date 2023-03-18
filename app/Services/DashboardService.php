<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User as AuthUser;

/**
 * Class DashboardService.
 */
class DashboardService
{
    protected AuthUser $user;

    public function __construct(AuthUser $user) {
        $this->user = $user;
    }
    public function dashboardData():array
    {
        return [
            'creditTransactions' => $this->fetchUserCreditTransactions(),
            'debitTransactions' => $this->fetchUserDebitTransactions(),
            'wallet' => $this->getUserWallet(),
        ];
    }

    public function fetchUserCreditTransactions()
    {
        return $this->user->transactions()->onlyCredit()->orderBy('id','DESC')->limit(5)->get();
    }

    public function fetchUserDebitTransactions()
    {
        return $this->user->transactions()->onlyDebit()->orderBy('id','DESC')->limit(5)->get();
    }

    public function getUserWallet()
    {
        return $this->user->wallet;
    }
}
