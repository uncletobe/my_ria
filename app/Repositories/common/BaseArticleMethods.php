<?php

namespace App\Repositories\common;

trait BaseArticleMethods {

    public function getIdBySlug($articleSlug) {

        $articleSlug = (string)$articleSlug;

        $result = $this
            ->startConditions()
            ->select('id')
            ->where('article_slug', $articleSlug)
            ->get()
            ->toArray();

        return $result;
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

        return $result;
    }

}