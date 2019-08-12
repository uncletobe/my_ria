<?php

namespace App\Repositories;

use App\Models\News\AuthorArticle as Model;
use App\Models\News\NewsPicture;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class AuthorArticleRepository extends CoreRepository {

    private $commonColumns = [
                'id',
                'author_id',
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
                ->limit($limit)
                ->with(['user:name'])
                ->get();
                //->toArray();

//        return $result;
//        $model = new NewsPicture();

        return $result;
    }


}


















