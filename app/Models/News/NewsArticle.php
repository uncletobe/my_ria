<?php

namespace App\Models\News;

use App\components\PictureHelper;
use App\Extensions\Redis\LikeModel;
use App\Extensions\Redis\RedisUtilites;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsArticle extends BaseArticleModel
{
    use SoftDeletes;
    use PictureHelper;

    const PUBLISHED = 1;

    private $set = 'newsArticle';
    private $resolution = [
        '925' => '_925x520',
        '768' => '_925x231',
        '640' => '_768x432',
        '480' => '_640x480',
        'min' => '_480x480',
    ];


    public function newsPicture() {
        return $this->hasMany('App\Models\News\NewsPicture', 'article_id');
    }

    public function newsComment() {
        return $this->hasMany('App\Models\News\NewsComment', 'article_id');
    }

    public function articleTag() {
        return $this->hasMany('App\Models\News\ArticleTag', 'article_id');
    }

    public function getCountEmotion($emotion) {
        return LikeModel::getCountEmotion($this->set, $this->id, $emotion);
    }

    public function getViews() {
        return RedisUtilites::getViews($this->id);
    }
}
