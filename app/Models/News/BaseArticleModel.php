<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Extensions\Redis\RedisUtilites;
use App\Extensions\Redis\LikeModel;

class BaseArticleModel extends Model
{
    protected $set = 'newsArticle';

    public function getPublishedAtAttribute($valueFromObject)
    {
        return Carbon::parse($valueFromObject)->diffForHumans() . ", " .
            Carbon::parse($valueFromObject)->format('h:m');
    }

    public function getViews() {
        return RedisUtilites::getViews($this->id);
    }

    public function getCountEmotion($emotion) {
        return LikeModel::getCountEmotion($this->set, $this->id, $emotion);
    }

}
