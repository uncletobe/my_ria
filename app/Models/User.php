<?php

namespace App\Models;

use App\components\PictureHelper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\components\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use PictureHelper;

    const PICTURE_EXTENSION = '.jpg';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

}
