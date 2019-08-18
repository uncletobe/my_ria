<?php

namespace App\Models\News;

use App\Models\User;

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

    public function getPicPathByRes($path, $res) {

        $storagePath = asset('/storage/uploads/preview');
        $picName = $storagePath . '/' . $path . $this->resolution[$res] . self::PICTURE_EXTENSION;

        return $picName;
    }

    public function getUserAvatar($path) {
        return User::getUserImgPath($path);
    }
}
