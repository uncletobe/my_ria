<?php

namespace App\components;


class Storage {

    public static function isImgExist($path) {
        return \File::exists($path);
    }

    public static function getDefaultimg() {
        return '/img/default.jpg';
    }

}