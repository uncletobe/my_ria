<?php

namespace App\Http\Controllers\Auth;

use App\Events\RestorePassword;
use App\Http\Requests\RestorePasswordRequest;
use App\Http\Controllers\Controller;

class RestorePasswordController extends Controller
{
    public function __invoke(RestorePasswordRequest $request)
    {
        $data = $request->input();

        if (!empty($data->errors)) {

            return response()->json($data->errors);
        }

        event(new RestorePassword($request['email']));

        return response()->json('password reseted');
    }
}
