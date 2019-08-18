<?php

namespace app\components;

class PicturePathHelper {

    const PICTURE_EXTENSION = '.jpg';

    private $resolution = [
        '925' => '_925x520',
        '768' => '_925x231',
        '640' => '_768x432',
        '480' => '_640x480',
        'min' => '_480x480',
    ];


    public static function getPicPathByRes($path, $res) {

        $storagePath = asset('/storage/uploads/preview');
        $picName = $storagePath . '/' . $path . self::$resolution[$res] . self::PICTURE_EXTENSION;

        return $picName;
    }

}