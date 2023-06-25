<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FundWalletRequest;
use App\Services\BankService;
use App\Services\TransactionService;
use App\Traits\ResponseTrait;

class TransactionController extends Controller
{
    use ResponseTrait;

    public function __construct(protected TransactionService $transactionService, protected BankService $bankService) {
    }

    public function fundWalletPage()
    {
        return view('transactions.fund-wallet');
    }

    public function transferFundPage()
    {
        $banks = $this->bankService->getActiveBanks();
        return view('transactions.transfer-fund', compact('banks'));
    }


    public function transferFundAction(FundWalletRequest $request)
    {
        try {
            $this->transactionService->saveCreditTransaction($request->validated());
            return $this->successResponse("Wallet Successfully funded");

        } catch (\Exception $ex) {
            return $this->errorResponse($ex->getMessage());
        }
    }


    public function fundWalletAction(FundWalletRequest $request)
    {
        try {
            $this->transactionService->saveCreditTransaction($request->validated());
            return $this->successResponse("Wallet Successfully funded");

        } catch (\Exception $ex) {
            return $this->errorResponse($ex->getMessage());
        }
    }

    public function fetchAllUserTransactions()
    {
        try {
            $transactions = $this->transactionService->fetchAllUserTransactions();
            return view('transactions.transactions', compact('transactions'));
        } catch (\Exception $ex) {
            return $this->errorResponse($ex->getMessage());
        }
    }
}
