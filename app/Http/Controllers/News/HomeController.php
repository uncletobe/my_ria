<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AtricleRepository;
use App\Repositories\AuthorArticleRepository;

class HomeController extends Controller
{
    private $articleRepository;
    private $authorArticleRepository;

    public function __construct()
    {
        $this->articleRepository = new AtricleRepository();
        $this->authorArticleRepository = new AuthorArticleRepository();
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

        //dd($mainArticles);

        return view('front.news.home',
            compact(
                'mainArticles',
                'readableArticles',
                'chessBoard',
                'newsCarousel',
                'authorNews'));
    }
}
