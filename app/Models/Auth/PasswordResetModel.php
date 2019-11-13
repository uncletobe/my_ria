<?php

namespace App\Models\Auth;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PasswordResetModel extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'email',
        'token',
        'created_at'
    ];

    protected $table = 'password_reset';

    public function getToken() {
        $token = $this->setToken();

        if ($this->saveToken($token)) return $token;

        return false;
    }

    public function setToken() {
        return \Str::random(rand(35, 50));
    }

    private function saveToken($token) {
        $this->token = $token;
        $this->created_at = Carbon::now();

        return $this->save();
    }

    public function resetToken() {
        $this->token = null;

        return $this->update();
    }
}
