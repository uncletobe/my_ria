<?php

namespace App\Models\News;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AuthorArticle extends Model
{
    public function user() {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
