<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AtricleRepository;

class HomeController extends Controller
{
    private $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new AtricleRepository();
    }


    public function index() {
        $mainArticles = $this->articleRepository->getMainNewsArticles();
        $readableArticles = $this->articleRepository->getReadableArticles();
        $chessBoard = $this->articleRepository->getArticlesForChessBoard();


        dd($chessBoard);
    }
}
