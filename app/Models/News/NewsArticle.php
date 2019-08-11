<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsArticle extends Model
{
    use SoftDeletes;

    public function newsPicture() {
        return $this->hasMany('App\Models\News\NewsPicture', 'article_id');
            //->select(['id', 'news_picture_path']);
    }
}
