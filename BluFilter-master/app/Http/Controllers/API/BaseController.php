<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function sendResponse($result, $message){
        $response = ['success' => true, 'message' => $message ];

        if(!empty($result))
            $response['data'] = $result;

        return response()->json($response, 200);
    }


    public function sendError($error, $errorMessages = [], $code = 404){
        $response = ['success' => false, 'message' => $error ];

        if(!empty($errorMessages))
            $response['errors'] = $errorMessages;

        return response()->json($response, $code);
    }
}
