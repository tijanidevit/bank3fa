<?php

namespace App\Services;

use App\Models\Bank;
use App\Models\UserWallet;
use App\Enums\TransactionType;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use App\Notifications\TransferNotification;

/**
 * Class TransactionService.
 */
class TransactionService
{
    public function __construct(protected User $user, protected UserWallet $userWallet, protected Bank $bank) {
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

    public function fundWallet($data)
    {
        $this->saveTransaction(auth()->user(),$data['amount'],$data['remark'],TransactionType::CREDIT);
    }


    public function transferFund($data)
    {
        $user = auth()->user();
        $bankCode = $data['bank_code'];
        $accountNumber = $data['account_number'];
        $amount = $data['amount'];
        $receiverName = $data['account_name'];
        $bankName = "FinBank";
        $amountWithNaira = "&#8358;". number_format($data['amount'],2);

        if ($bankCode != "FBN000") {
            $bank = $this->bank->whereCode($bankCode)->first();
            $bankName = $bank->name;
        }
        else{
            //Save the credit transaction only if the user is from FinBank
            $sender = auth()->user()->fullname;
            $account = $this->userWallet->with('user')->whereAccountNumber($accountNumber)->first();
            $receiver = $account->user;

            $creditRemark = "$amountWithNaira received from $sender - $bankName";
            $this->saveTransaction($receiver, $amount, $creditRemark, TransactionType::CREDIT);
        }

        //Save the debit transaction
        $debitRemark = "$amountWithNaira transferred to $receiverName ($accountNumber - $bankName)";
        $this->saveTransaction(auth()->user(), $amount * -1, $debitRemark, TransactionType::DEBIT);

    }


    protected function saveTransaction($user,$amount,$remark,$type)
    {
        DB::transaction(function () use ($user,$amount,$remark,$type)
        {
            $balance_before = $user->wallet->balance;
            $balance_after = $balance_before + $amount;
            $user->transactions()->create([
                'amount' => $amount,
                'balance_before' => $balance_before,
                'balance_after' => $balance_after,
                'remark' => $remark,
                'type' => $type
            ]);

            $user->wallet()->update([
                'balance' => $balance_after
            ]);

            $user->notify(new TransferNotification($remark, $amount));
        });
    }

}
