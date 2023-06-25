<?php

namespace App\Services;

use App\Models\Bank;
use App\Models\UserWallet;
use App\Utils\PaystackUtil;
use Exception;
use Illuminate\Support\Facades\Http;

/**
 * Class BankService.
 */
class BankService
{

    public function __construct(protected Bank $bank, protected UserWallet $userWallet) {
    }

    function getActiveBanks() {
        return $this->bank->onlyActive()->orderBy('order')->get();
    }

    function resolveAccountNumber(array $data) {
        $bankCode = $data['bank_code'];
        $accountNumber = $data['account_number'];

        if ($bankCode == "FBN000") {
            $account = $this->userWallet->with('user')->whereAccountNumber($accountNumber)->first();
            if ($account) {
                if($account->user->id != auth()->id()){
                    return $account->user?->fullname;
                }
                throw new Exception('You cannot transfer funds to your own account');
            }
            throw new Exception('Account not found');
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$accountNumber&bank_code=$bankCode",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ". config('services.paystack.test_secret_key'),
            "Cache-Control: no-cache",
            ),
        ));

        $response =json_decode(curl_exec($curl), true);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            if (!$response['status']) {
                throw new Exception('Account not found');
            }
            return $response['data']['account_name'];
        }
    }
}
