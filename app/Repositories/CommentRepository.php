<?php

namespace App\Repositories;

use App\Models\News\NewsComment as Model;


/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class AtricleRepository extends CoreRepository {

    private $commonColumns = [
                'id',
                'article_id',
                'user_id',
                'comment_raw',
                'updated_at'
            ];


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getCommentsForArticle($id) {

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->whereIn('id', $id)
            ->with(['user:id,name,avatar'])
            ->get();

        return $result;
    }

}


















