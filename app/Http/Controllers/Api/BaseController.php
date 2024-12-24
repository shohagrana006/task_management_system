<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    // success message api response
    public static function successWithResponse($message = 'Successfully done', $code = 200, $data = null)
    {
        return response()->json([
            'success' => true,
            'status_code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    // error message api response
    public static function errorWithResponse($message = 'Data not found', $code = 404, $data = null)
    {
        return response()->json([
            'success' => false,
            'status_code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    } 
}
