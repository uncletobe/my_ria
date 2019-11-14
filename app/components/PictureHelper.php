<?php

namespace App\components;

use App\components\Storage;
use App\components\Constants;

trait PictureHelper {

    private $storagePrevPath = '/storage/uploads/preview';
    private $storageAvPath = '/storage/uploads/avatars';

    public function getPicPathByRes($path, $res) {

        $picPath = $path . $this->resolution[$res] . Constants::PICTURE_EXTENSION;
        $serverPath = url("") . $this->storagePrevPath . '/' . $picPath;

        if (!Storage::isImgExist($serverPath)) {
            return Storage::getDefaultimg();
        }

        $webPath = asset($this->storagePrevPath) . '/' . $picPath;

        return $webPath;
    }

    public function getUserAvatar($path) {

        $picPath = $path . Constants::PICTURE_EXTENSION;
        $serverPath = url("") . $this->storageAvPath . '/' . $picPath;

        if (!Storage::isImgExist($serverPath)) {
            return Storage::getDefaultimg();
        }

        $webPath = asset($this->storageAvPath) . '/' . $picPath;

        return $webPath;
    }

}