<?php

use Illuminate\Http\Response;

if (!function_exists('successResponse')) {
    function successResponse($data, $title, $message, $code = Response::HTTP_OK)
    {
        return response()->json([
            "status" => $code,
            "responseTitle" => $title,
            "responseMessage" => $message,
            "obj" => $data
        ], $code);
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($title, $message, $code = Response::HTTP_INTERNAL_SERVER_ERROR, $errors = null)
    {
        return response()->json([
            "status" => $code,
            "responseTitle" => $title,
            "responseMessage" => $message,
            "errors" => $errors
        ], $code);
    }
}
