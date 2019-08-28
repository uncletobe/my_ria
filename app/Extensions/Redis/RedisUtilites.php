<?php


namespace App\Extensions\Redis;

use Illuminate\Support\Facades\Redis;

class RedisUtilites
{
    public static function addViews($articleId) {
        Redis::incr("articleViews:$articleId");
    }

    public static function getViews($articleId) {
        return Redis::get("articleViews:$articleId");
    }

    public static function addUserIpForArticleViews($articleId, $userIp) {
        Redis::sadd("articleUsersIp:{$articleId}", $userIp);
    }

    public static function isUserIpInArticleViews($articleId, $userIp) {
        $result = Redis::sismember("articleUsersIp:{$articleId}", $userIp);

        if ($result == 1) return true;

        return false;
    }
}