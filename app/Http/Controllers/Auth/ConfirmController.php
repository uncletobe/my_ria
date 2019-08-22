<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfirmController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function __invoke($token)
    {
        $user = $this->userRepository->getUserByToken($token);

        if(empty($user[0])) {
            return abort('404');
        }

        $user = $user[0];
        $result = $user->confirmEmail();

        if(!$result) {
            return abort('404');
        } else {
            Auth::login($user);
            return redirect('/')->with('succReg', 'success');
        }
    }
}
