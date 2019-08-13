<?php

namespace App\Models\News;

use App\Models\User;

class AuthorArticle extends BaseArticleModel
{
    public function user() {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
