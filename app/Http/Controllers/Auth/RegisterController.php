<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Notifications\ConfirmEmail;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function __invoke(RegisterRequest $request) {

        $data = $request->input();

        if (!empty($data->errors)) {

            return response()->json($data->errors);
        }

        $user = (new User())->create($data);

        if ($user) {

            event(new UserCreated($user));

            return \Response::json('success');
        }

    }

}
