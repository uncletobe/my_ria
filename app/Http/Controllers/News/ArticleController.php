<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AtricleRepository;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct() {
        $this->articleRepository = new AtricleRepository();
    }

    public function index($articleSlug) {

        $article = $this->articleRepository->getSingleArticle($articleSlug);

        //dd($article);
        return view('welcome');
    }
}
