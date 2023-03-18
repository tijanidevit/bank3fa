<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User as AuthUser;

/**
 * Class TransactionService.
 */
class TransactionService
{
    protected AuthUser $user;

    public function __construct(AuthUser $user) {
        $this->user = $user;
    }
    public function fetchLimitedUserCreditTransactions(int $limit)
    {
        return $this->user->transactions()->onlyCredit()->limit($limit)->get();
    }

    public function fetchLimitedUserDebitTransactions(int $limit)
    {
        return $this->user->transactions()->onlyDebit()->limit($limit)->get();
    }

    public function fetchPaginatedUserTransactions(string $type = null, )
    {
        return $this->user->transactions()->onlyCredit()->limit($limit)->get();
    }
}
