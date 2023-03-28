<?php

namespace App\Helpers;

class HttpHelper
{
    public static function apiResponse($data, $message, $errors = [], $status = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}
