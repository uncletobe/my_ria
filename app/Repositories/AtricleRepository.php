<?php

namespace App\Repositories;

use App\Models\News\NewsArticle as Model;
use App\Models\News\NewsArticle;


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

    private $sinleArticleColumns = [
            'news_articles.id',
            'article_title',
            'article_content_html',
            'views',
            'published_at',
            'tag_title',
            'tag_slug',
            'category_title',
            'category_slug'
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
            ->with([
                'newsPicture:id,article_id,news_picture_path'
            ])
            ->limit($limit)
            ->orderBy('id', 'DESC')
            ->get();


        return $result;
    }


    public function getReadableArticles($limit = 7) {

        $where = 'is_published=1 AND published_at > (NOW() - INTERVAL 1 DAY)';

        $where = 'is_published=1';

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->whereRaw($where)
            ->orderBy('views', 'ASC')
            ->limit($limit)
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
            ->get();

        return $result;

    }


    public function getArticlesForNewsCarousel($limit = 6) {

        $ids = implode(',', $this->readAricleIds);

//        $where = ('(is_published=1) AND (is_main_news=0) AND
//                    (published_at > (NOW() - INTERVAL 1 DAY)) AND
//                    (id NOT IN('.$ids.'))'
//                 );

        $where = 'is_published=1 AND is_main_news=0 AND id NOT IN('.$ids.')';

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->whereRaw($where)
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get();

        return $result;
    }


    public function getSingleArticle($articleSlug) {

        $this->commonColumns[] = 'article_content_html';
        $articleSlug = (string)$articleSlug;

        $result = $this
            ->startConditions()
            ->select($this->sinleArticleColumns)
            ->where('article_slug', $articleSlug)
            ->limit(1)
            ->with([
                'newsPicture:id,article_id,news_picture_path',
            ])
            ->join('article_tags', 'article_tags.article_id', '=', 'news_articles.id')
            ->join('news_tags', 'news_tags.id', '=', 'article_tags.tag_id')
            ->join('news_categories', 'news_categories.id', '=', 'news_tags.parent_id')
            ->get();
            //->toArray();

        return $result;
    }

    public function getArticlesForRecommendCarousel($limit = 18) {

        $result = $this
            ->startConditions()
            ->select($this->commonColumns)
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->get();

        return $result;
    }

}


















