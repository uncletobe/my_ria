<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->input();

        if (!empty($data->errors)) {

            return response()->json($data->errors);
        }

        $conditions = [
            'email' => $data['email'],
            'password' => $data['password'],
            'is_verified' => true,
            'deleted_at' => null,
        ];

        if (Auth::attempt($conditions)) {

            return \Response::json('success-login');
        }

        return \Response::json('fail-login', 401);
    }
}
