<?php

namespace App\components;

use App\components\Storage;

trait PictureHelper {

    private $storagePrevPath = '/storage/uploads/preview';
    private $storageAvPath = '/storage/uploads/avatars';

    public function getPicPathByRes($path, $res) {

        $picPath = $path . $this->resolution[$res] . self::PICTURE_EXTENSION;
        $serverPath = $_SERVER['DOCUMENT_ROOT'] . $this->storagePrevPath . '/' . $picPath;

        if (!Storage::isImgExist($serverPath)) {
            return Storage::getDefaultimg();
        }

        $webPath = asset($this->storagePrevPath) . '/' . $picPath;

        return $webPath;
    }

    public function getUserAvatar($path) {

        $picPath = $path . self::PICTURE_EXTENSION;
        $serverPath = $_SERVER['DOCUMENT_ROOT'] . $this->storageAvPath . '/' . $picPath;

        if (!Storage::isImgExist($serverPath)) {
            return Storage::getDefaultimg();
        }

        $webPath = asset($this->storageAvPath) . '/' . $picPath;

        return $webPath;
    }

}