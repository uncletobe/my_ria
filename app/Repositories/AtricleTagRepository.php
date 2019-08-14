<?php

namespace App\Repositories;

use App\Models\News\NewsTag as Model;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class AtricleRepository extends CoreRepository {

    private $commonColumns = [
                'id',
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


    public function getTagsForArticle($id) {

    }

}


















