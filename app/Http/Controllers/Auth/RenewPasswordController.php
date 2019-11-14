<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RenewPasswordRequest;
use App\Repositories\PasswordResetRepository;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class RenewPasswordController extends Controller
{
    private $pasResRepos;
    private $userRepos;

    public function __construct(PasswordResetRepository $passwordResetRepository, UserRepository $userRepository)
    {
        $this->pasResRepos = $passwordResetRepository;
        $this->userRepos = $userRepository;
    }

    public function index($token)
    {
        $elem = $this->pasResRepos->getRecordByToken($token);

        if (empty($elem[0])) abort(404);

        session(['renewPassToken' => $token]);
        return redirect('/');
    }

    public function renewPassword(RenewPasswordRequest $request)
    {
        $data = $request->input();

        if (!empty($data->errors)) {

            return response()->json($data->errors);
        }

        $token = session('renewPassToken');
        $elem = $this->pasResRepos->getRecordByToken($token);

        if (empty($elem[0])) abort(404);

        $user = $this->userRepos->getUserById($elem[0]->user_id);

        $passResult = $user[0]->setPassword($data['password']);
        $tokenResult = $elem[0]->resetToken();

        if (!($passResult && $tokenResult)) {

            return response()->json('password cant renew');
        }

        \Session::forget('renewPassToken');
        return response()->json('password renew');
    }

}
