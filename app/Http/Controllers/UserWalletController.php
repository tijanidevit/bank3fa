<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserWalletService;
use Illuminate\Http\Request;

class UserWalletController extends Controller
{
    public function __construct(protected UserWalletService $userWalletService) {
    }

    public function create()
    {
        return view('user-wallet.create');
    }
}
