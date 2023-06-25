<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Services\BankService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResolveAccountRequest;
use Exception;

class BankController extends Controller
{
    use ResponseTrait;
    public function __construct(protected BankService $bankService) {
    }

    public function resolveAccount(ResolveAccountRequest $request) {
        try {
            $data = $this->bankService->resolveAccountNumber($request->validated());
            return $this->successResponse("Bank resolved successfully",$data);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(),200);
        }
    }
}
