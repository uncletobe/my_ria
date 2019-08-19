<?php

namespace App\Models\News;

use App\Models\User;
use App\components\Storage;

class AuthorArticle extends BaseArticleModel
{
    const PICTURE_EXTENSION = '.jpg';

    private $resolution = [
        '480' => '_480x270',
        'min' => '_480x360',
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

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
        $picPath = $storagePath . '/' . $path . $this->resolution[$res] . self::PICTURE_EXTENSION;

        if (!Storage::isImgExist($picPath)) {
            return Storage::getDefaultimg();
        }

        return $picPath;
    }

    public function getUserAvatar($path) {
        $picPath = User::getUserImgPath($path);

        if (!Storage::isImgExist($picPath)) {
            return Storage::getDefaultimg();
        }

        return $picPath;
    }
}
