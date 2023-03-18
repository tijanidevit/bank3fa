<?php

namespace App\Traits;

trait ResponseTrait
{
    public function successResponse($message= "Successful" ,$data=[], $code = 200)
    {
        return response([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
    public function errorResponse($message= "Not successful", $code = 500)
    {
        return response([
            'status' => false,
            'message' => $message,
        ], $code);
    }
}
