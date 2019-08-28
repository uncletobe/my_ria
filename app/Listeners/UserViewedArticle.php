<?php

namespace App\Listeners;

use App\Events\ArticleView;
use App\Extensions\Redis\RedisUtilites;


class UserViewedArticle
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticleView $articleView)
    {
        $isUserViewed = RedisUtilites::isUserIpInArticleViews($articleView->articleId, $articleView->userIp);

        if (!$isUserViewed) {
           RedisUtilites::addViews($articleView->articleId);
           RedisUtilites::addUserIpForArticleViews($articleView->articleId, $articleView->userIp);
        }
    }

}
