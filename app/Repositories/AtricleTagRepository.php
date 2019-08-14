<?php

namespace App\Repositories;

use App\Models\News\ArticleTag as Model;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class AtricleTagRepository extends CoreRepository {

    private $commonColumns = [
                'article_id',
                'tag_id',
                'tag_title',
                'tag_slug',
                'category_slug',
                'category_title',
            ];


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }


    public function getTagsForArticle($id) {

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->where('article_id', $id)
            ->join('news_tags', 'news_tags.id', '=', 'article_tags.tag_id')
            ->join('news_categories', 'news_categories.id', '=', 'news_tags.parent_id')
            ->get()
            ->toArray();

        return $result;
    }

}


















