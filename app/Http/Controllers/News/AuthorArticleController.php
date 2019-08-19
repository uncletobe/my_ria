<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AuthorArticleRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ArticleTagRepository;
use App\Repositories\ArticleRepository;

class AuthorArticleController extends Controller
{
    private $authorArticleRepository;
    private $articleRepository;
    private $commentRepository;
    private $articleTagRepository;

    public function __construct() {
        $this->authorArticleRepository = new AuthorArticleRepository();
        $this->commentRepository = new CommentRepository();
        $this->articleTagRepository = new ArticleTagRepository();
        $this->articleRepository = new ArticleRepository();
    }

    public function index($articleSlug) {

        $article = $this->authorArticleRepository->getSingleArticle($articleSlug);

        if (empty($article[0])) {
            abort(404);
        }

        $article = $article[0];

        $tags = $this->articleTagRepository->getTagsForArticle($article->id);
        $comments = $this->commentRepository->getCommentsForArticle($article->id);
        $recommendCarousel = $this->articleRepository->getArticlesForRecommendCarousel();

        //dd($tags);

        return view('front.news.single_page.single-page',
            compact(
                'article',
                'tags',
                'comments',
                'recommendCarousel'
            ));
    }
}
