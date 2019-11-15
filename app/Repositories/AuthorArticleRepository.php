<?php

namespace App\Repositories;

use App\Models\News\AuthorArticle as Model;
use App\Models\News\NewsArticle;
use App\Repositories\common\BaseArticleMethods;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class AuthorArticleRepository extends CoreRepository {
    use BaseArticleMethods;

    private $commonColumns = [
                'id',
                'author_id',
                'article_title',
                'article_slug',
                'article_excerpt',
                'article_picture_preview_path',
                'published_at',
            ];


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAuthorArticles($limit = 3) {

        $result = $this->startConditions()
                ->select($this->commonColumns)
                ->orderBy('id', 'DESC')
                ->where('is_published', NewsArticle::PUBLISHED)
                ->limit($limit)
                ->with(['user:id,name,avatar'])
                ->get();
                //->toArray();

        return $result;
    }


}


















