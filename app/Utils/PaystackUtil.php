<?php
namespace App\Utils;

class PaystackUtil{

    public static function getHeaders() {
        return [
            "Authorization: Bearer ". config('services.paystack.test_key'),
            "Cache-Control: no-cache",
        ];
    }
    public static function getSecretHeaders() {
        return [
            "Authorization: Bearer ". config('services.paystack.test_secret_key'),
            // "Cache-Control: no-cache",
        ];
    }
}
