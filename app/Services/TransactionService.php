<?php

namespace App\Services;

use App\Enums\TransactionType;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

/**
 * Class TransactionService.
 */
class TransactionService
{
    public function __construct(protected User $user) {
    }
    public function fetchLimitedUserCreditTransactions(int $limit)
    {
        return $this->user->transactions()->onlyCredit()->limit($limit)->get();
    }

    public function fetchLimitedUserDebitTransactions(int $limit)
    {
        return $this->user->transactions()->onlyDebit()->limit($limit)->get();
    }

    public function fetchAllUserTransactions()
    {
        return auth()->user()->transactions;
    }

    public function saveCreditTransaction($data)
    {
        DB::transaction(function () use ($data)
        {
            $user = auth()->user();
            extract($data);
            $balance_before = $user->wallet->balance;
            $balance_after = $balance_before + $amount;
            $remark = "Wallet Funding of &#8358;". number_format($amount,2);
            $user->transactions()->create([
                'amount' => $amount,
                'balance_before' => $balance_before,
                'balance_after' => $balance_after,
                'remark' => $remark,
                'type' => TransactionType::CREDIT
            ]);

            $user->wallet()->update([
                'balance' => $balance_after
            ]);
        });
    }


}
