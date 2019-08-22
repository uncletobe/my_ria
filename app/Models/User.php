<?php

namespace App\Models;

use App\components\Constants;
use App\components\PictureHelper;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use PictureHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function authorArticle() {
//        return $this->hasMany('App\Models\News\AuthorArticle', 'author_id', 'id');
//    }


    public function getUserName() {
        if (empty($this->name)) {
           return $this->email;
        }

        return $this->name;
    }


    public function confirmEmail() {
        if(!empty($this->email_verified_at)) {
            return false;
        }

        $this->email_verified_at = Carbon::now();
        $this->updated_at = Carbon::now();
        $this->role_id = Constants::DEFAULT_USER_ROLE;
        $result = $this->update();

        return $result;
    }

}
