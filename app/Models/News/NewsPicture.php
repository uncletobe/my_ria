<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsPicture extends Model
{
    public function newsArticle() {
        return $this->hasMany('App\Models\News\NewsArticle', 'article_id');
    }
}
