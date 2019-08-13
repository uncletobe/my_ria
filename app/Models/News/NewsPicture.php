<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsPicture extends Model
{
    public function newsArticle() {
        return $this->hasOne('App\Models\News\NewsArticle', 'id', 'article_id');
    }
}
