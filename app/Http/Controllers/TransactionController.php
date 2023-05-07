<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FundWalletRequest;
use App\Services\TransactionService;
use App\Traits\ResponseTrait;

class TransactionController extends Controller
{
    use ResponseTrait;

    public function __construct(protected TransactionService $transactionService) {
    }

    public function fundWalletPage()
    {
        return view('transactions.fund-wallet');
    }

    public function fundWalletApi(FundWalletRequest $request)
    {
        try {
            return $this->successResponse('success', [auth()->user(),111]);
            $data = $this->transactionService->saveCreditTransaction($request->validated());
            return $this->successResponse('success', auth()->user());
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
}
