<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repositories\AtricleRepository;
use App\Repositories\CommentRepository;
use function Sodium\compare;

class ArticleController extends Controller
{
    private $articleRepository;
    private $commentRepository;

    public function __construct() {
        $this->articleRepository = new AtricleRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function index($articleSlug) {

        $article = $this->articleRepository->getSingleArticle($articleSlug);

        if (empty($article[0])) {
           abort(404);
        }

        $article = $article[0];
        $comments = $this->commentRepository->getCommentsForArticle($article->id);
        $recommendCarousel = $this->articleRepository->getArticlesForRecommendCarousel();

        //dd($comments);

        return view('front.news.single_page.single-page',
            compact(
                'article',
                'comments',
                'recommendCarousel'
                ));
    }
}
