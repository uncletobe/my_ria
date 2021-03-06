<?php

namespace App\Models\News;

use App\components\PictureHelper;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsArticle extends BaseArticleModel
{
    use SoftDeletes;
    use PictureHelper;

    const PUBLISHED = 1;

    private $resolution = [
        '925' => '_925x520',
        '768' => '_925x231',
        '640' => '_768x432',
        '480' => '_640x480',
        'min' => '_480x480',
    ];


    public function newsPicture() {
        //select `id`, `article_id`, `news_picture_path` from `news_pictures`
        // where `news_pictures`.`article_id` in (393, 403, 416, 427, 432, 441, 496)
        return $this->hasMany('App\Models\News\NewsPicture', "article_id");
    }

    public function newsComment() {
        return $this->hasMany('App\Models\News\NewsComment', "article_id");
    }

    public function articleTag() {
        return $this->hasMany('App\Models\News\ArticleTag', 'article_id');
    }

}
