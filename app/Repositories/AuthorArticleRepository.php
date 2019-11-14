<?php

namespace App\Repositories;

use App\Models\News\AuthorArticle as Model;
use App\Models\News\NewsArticle;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class AuthorArticleRepository extends CoreRepository {

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

    public function getSingleArticle($articleSlug) {

        $this->commonColumns[] = 'article_content_html';
        $articleSlug = (string)$articleSlug;

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->where('article_slug', $articleSlug)
            ->limit(1)
            ->with([
                'newsPicture:id,article_id,news_picture_path',
            ])
            ->get();
        //->toArray();

        return $result;
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


















