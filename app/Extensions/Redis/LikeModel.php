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

        $result[$plusEmotion] = $this->getCountEmotion($plusEmotion);
        $result[$this->minusEmotionName] = $this->getCountEmotion($this->minusEmotionName);

        return $result;
    }

    private function addEmotion($plusEmotion) {
        Redis::sadd("{$this->set}:{$this->articleId}:{$plusEmotion}", $this->userId);
    }

    private function removeEmotion($minusEmotion) {
        Redis::srem("{$this->set}:{$this->articleId}:{$minusEmotion}", $this->userId);
    }


    private function getCountEmotion($emotion) {
        return Redis::scard("{$this->set}:{$this->articleId }:{$emotion}");
    }

    private function searchMinusEmoteFactory($plusEmotion) {
        $liked = '';

        foreach ($this->emotions as $emotion) {
            if ($emotion == $plusEmotion) continue;
            $liked = $this->isLikedBy($emotion);

            if ($liked) {
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
}