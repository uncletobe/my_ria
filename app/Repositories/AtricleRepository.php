<?php

namespace App\Repositories;

use App\Models\News\NewsArticle as Model;
use function foo\func;

/**
 * Class AtricleRepository
 * @package App\Repositories
 */
class AtricleRepository extends CoreRepository {

    private $commonColumns = [
                'id',
                'article_slug',
                'article_excerpt',
                'article_picture_preview_path',
                'published_at',
            ];

    private $readAricleIds;


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getMainNewsArticles($limit = 7) {

        $where = [
            'is_main_news' => 1,
            'is_published' => 1,
        ];

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->where($where)
            ->with(['newsPicture:id,news_picture_path'])
            ->limit($limit)
            ->orderBy('id', 'DESC')
            //->toBase()
            ->get();
            //->toArray();

        return $result;
    }


    public function getReadableArticles($limit = 7) {

        $where = 'is_published=1 AND published_at > (NOW() - INTERVAL 1 DAY)';

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->whereRaw($where)
            ->orderBy('views', 'ASC')
            ->limit($limit)
            ->toBase()
            ->get();

        if ($result) {
            $this->readAricleIds = $result->pluck('id')->toArray();
        }

        return $result;
    }

    public function getArticlesForChessBoard($limit = 18) {

        $ids = implode(',', $this->readAricleIds);

        $where = '(is_published=1) AND (is_main_news=0) AND 
        (id NOT IN('.$ids.'))';

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->whereRaw($where)
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->toBase()
            ->get();

        return $result;

    }


    public function getArticlesForNewsCarousel($limit = 6) {

        $ids = implode(',', $this->readAricleIds);

        $where = ('(is_published=1) AND (is_main_news=0) AND
                    (published_at > (NOW() - INTERVAL 1 DAY)) AND 
                    (id NOT IN('.$ids.'))'
                 );

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->whereRaw($where)
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->toBase()
            ->get();

        return $result;
    }


}


















