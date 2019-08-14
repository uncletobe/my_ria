<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\SoftDeletes;

class NewsArticle extends BaseArticleModel
{
    use SoftDeletes;


    public function newsPicture() {
        return $this->hasMany('App\Models\News\NewsPicture', 'article_id');
    }

    public function newsComment() {
        return $this->hasMany('App\Models\News\NewsComment', 'article_id');
    }


    public function articleTag() {
        return $this->hasMany('App\Models\News\ArticleTag', 'article_id');
    }

}
