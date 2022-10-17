<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Http\Controllers\API\BaseController;

class PasswordController extends Controller
{
    protected function sendResetLinkResponse(Request $request)
    {
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => "required|email"
        ]);
        if ($validator->fails()) {
            return $this->sendError(__('validation_error'), $validator->errors());
        }
        $response =  Password::sendResetLink($input);
        if ($response == Password::RESET_LINK_SENT) {
            $message = __('messages.api.check_email');
           return $response = ['success' => true, 'message' => $message];
        } else {
            $message = __("messages.api.cant_be_send");
            return $response = ['success' => false, 'message' => $message];
        }
        // $message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' : 'Mail Not Send Successfuly';
        
    }
    protected function sendResetResponse(Request $request)
    {
        //password.reset
        $input = $request->only('email', 'token', 'password', 'password_confirmation');
        $validator = Validator::make($input, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $response = Password::reset($input, function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
            $user->setRememberToken(str::random(60));
            event(new PasswordReset($user));
        });
        if ($response == Password::PASSWORD_RESET) {
            $message = "Password reset successfully";
        } else {
            $message = "Email could not be sent to this email address";
        }
        $response = ['data' => '', 'message' => $message];
        return response()->json($response);
    }
    private function sendResponse($result, $message)
    {
        $response = ['success' => true, 'message' => $message];

        if (!empty($result))
            $response['data'] = $result;

        return response()->json($response, 200);
    }


    private function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = ['success' => false, 'message' => $error];

        if (!empty($errorMessages))
            $response['errors'] = $errorMessages;

        return response()->json($response, $code);
    }
}

