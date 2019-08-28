<?php

namespace App\Models;

use App\components\Constants;
use App\components\PictureHelper;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use Notifiable;
    use PictureHelper;

    public $howLongRegister;

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
        if($this->is_verified == 1) {
            return false;
        }

        $this->email_verified_at = Carbon::now();
        $this->updated_at = Carbon::now();
        $this->role_id = Constants::DEFAULT_USER_ROLE;
        $this->is_verified = 1;
        $result = $this->update();

        return $result;
    }

    public function getDefaultAvatar() {
        return mb_strtoupper(substr($this->email, 0, 1));
    }

    public function getRegisterTime() {

        $registred = Carbon::parse($this->email_verified_at);
        $date = $registred->diffForHumans(['syntax' => CarbonInterface::DIFF_ABSOLUTE]);

        $start = strpos($date, ' ');
        $this->howLongRegister = substr($date, strpos($date, ' ', $start));

        return substr($date, 0, $start);
    }

    public function getHowLongRegister() {
        return $this->howLongRegister;
    }

    public function countUserLikes() {
        $result = Redis::get("user-comments-count:{$this->id}");

        if(empty($result)) $result = 0;

        return $result;
    }

    public static function getUserIp() {
        return \Request::ip();
    }

}
