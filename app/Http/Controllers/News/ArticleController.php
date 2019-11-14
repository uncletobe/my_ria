<?php

namespace App\Http\Controllers\News;

use App\Events\ArticleView;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\ArticleTagRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;


class ArticleController extends Controller
{
    private $articleRepository;
    private $commentRepository;
    private $articleTagRepository;

    public function __construct
                                (
                                    ArticleRepository $articleRepository,
                                    CommentRepository $commentRepository,
                                    ArticleTagRepository $articleTagRepository
                                ) {
        $this->articleRepository = $articleRepository;
        $this->commentRepository = $commentRepository;
        $this->articleTagRepository = $articleTagRepository;
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

        $userIp = \Request::ip();

        event(new ArticleView($article->id, $userIp));

        return view('front.news.single_page.single-page',
            compact(
                'article',
                'tags',
                'comments',
                'recommendCarousel'
                ));
    }
}
