<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleTagRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    private $articleRepository;
    private $commentRepository;

    public function __construct() {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
        $this->articleTagRepository = new ArticleTagRepository();
    }

    public function index($articleSlug) {

        $article = $this->articleRepository->getSingleArticle($articleSlug);

        if (empty($article[0])) {
           abort(404);
        }

        $article = $article[0];

        $tags = $this->articleTagRepository->getTagsForArticle($article->id);
        $comments = $this->commentRepository->getCommentsForArticle($article->id);
        $recommendCarousel = $this->articleRepository->getArticlesForRecommendCarousel();

        return view('front.news.single_page.single-page',
            compact(
                'article',
                'tags',
                'comments',
                'recommendCarousel'
                ));
    }
}
