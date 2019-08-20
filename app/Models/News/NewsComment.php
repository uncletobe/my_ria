<?php

namespace App\Models\News;

use App\components\PictureHelper;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    use PictureHelper;

    public function newsArticle() {
        return $this->hasOne('App\Models\News\NewsArticle', 'id', 'article_id');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
