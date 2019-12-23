<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\AuthorArticleRepository;


class HomeController extends Controller
{
    private $articleRepository;
    private $authorArticleRepository;

    public function __construct(ArticleRepository $articleRepository, AuthorArticleRepository $authorArticleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->authorArticleRepository = $authorArticleRepository;
    }


    public function index() {

        $mainArticles = $this->articleRepository->getMainNewsArticles();
        $readableArticles = $this->articleRepository->getReadableArticles();

        $chessBoard = $this->articleRepository->getArticlesForChessBoard();
        $newsCarousel = $this->articleRepository->getArticlesForNewsCarousel();
        $authorNews = $this->authorArticleRepository->getAuthorArticles();

        $result = $mainArticles &&
            $readableArticles &&
            $chessBoard &&
            $newsCarousel &&
            $authorNews;

        if(!$result) {
            abort(404);
        }

        return view('front.news.home.home',
            compact(
                'mainArticles',
                'readableArticles',
                'chessBoard',
                'newsCarousel',
                'authorNews'));
    }
}
