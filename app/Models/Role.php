<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const DEFAULT_USER_ROLE = 4;

    public function users() {
        return $this->hasMany('App\Models\User');
    }
}
