<?php


namespace App\Extensions\Redis;

use Illuminate\Support\Facades\Redis;

class RedisUtilites
{
    public static function addViews($set, $articleId) {
        Redis::incr("{$set}:$articleId");
    }

    public static function getViews($set, $articleId) {
        return Redis::get("{$set}:$articleId");
    }
}