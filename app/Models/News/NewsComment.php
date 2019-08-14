<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    public function newsArticle() {
        return $this->hasOne('App\Models\News\NewsArticle', 'id', 'article_id');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
