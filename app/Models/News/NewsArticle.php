<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\SoftDeletes;

class NewsArticle extends BaseArticleModel
{
    use SoftDeletes;

    const PICTURE_EXTENSION = '.jpg';

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

    public function getPicPathByRes($path, $res) {

        $storagePath = asset('/storage/uploads/preview');
        $picName = $storagePath . '/' . $path . $this->resolution[$res] . self::PICTURE_EXTENSION;

        return $picName;
    }

}
