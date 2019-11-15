<?php


namespace App\Extensions\Redis;

use Illuminate\Support\Facades\Redis;

class LikeModel
{
    private $set;
    private $articleId;
    private $userId;
    private $minusEmotionName;

    private $emotions = [
        'like',
        'funny',
        'amazing',
        'sad',
        'angry',
        'unlike',
    ];

    /**
     * LikeModel constructor.
     * @param $type string
     * @param $articleId int
     * @param $userId int
     */
    public function __construct($type, $articleId, $userId)
    {
        $this->set = $type;
        $this->articleId = $articleId;
        $this->userId = $userId;
    }

    public function handleEmotion($plusEmotion) {
        $result = [];

        $this->addEmotion($plusEmotion);
        $this->searchMinusEmoteFactory($plusEmotion);

        $this->addCountForUserLikes();

        $result[$plusEmotion] = self::getCountEmotion($this->set, $this->articleId, $plusEmotion);
        $result[$this->minusEmotionName] = self::getCountEmotion($this->set, $this->articleId, $this->minusEmotionName);

        return $result;
    }

    private function addEmotion($plusEmotion) {
        Redis::sadd("{$this->set}:{$this->articleId}:{$plusEmotion}", $this->userId);
    }

    private function removeEmotion($minusEmotion) {
        Redis::srem("{$this->set}:{$this->articleId}:{$minusEmotion}", $this->userId);
    }

    private function searchMinusEmoteFactory($plusEmotion) {
        $liked = '';

        foreach ($this->emotions as $emotion) {
            if ($emotion == $plusEmotion) continue;
            $liked = $this->isLikedBy($emotion);

            if ($liked == 1) {
                $this->removeEmotion($emotion);
                $this->minusEmotionName = $emotion;
                break;
            }
        }
    }

    private function isLikedBy($emotion) {

        $result = Redis::sismember("{$this->set}:{$this->articleId}:{$emotion}", $this->userId);

        if(!empty($result)) return true;

        return false;
    }

    public static function getCountEmotion($set, $articleId, $emotion) {
        return Redis::scard("{$set}:{$articleId }:{$emotion}");
    }

    public static function abc($emotion) {
        return Redis::smembers('newsArticle:496:'.$emotion);
    }

    public function addCountForUserLikes() {
        if (empty($this->minusEmotionName)) {
            Redis::incr("user-comments-count:{$this->userId}");
        }
    }
}