<?php

namespace App\Http\Controllers\News;

use App\Extensions\Redis\LikeModel;
use App\Http\Requests\NewsLikeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ArticleRepository;
use App\Repositories\AuthorArticleRepository;

class NewsLikeController extends Controller
{
    private $articleRepository;
    private $authorArticleRepository;

    public function __invoke(
                                NewsLikeRequest $request,
                                ArticleRepository $articleRepository,
                                AuthorArticleRepository $authorArticleRepository
                            ) {


        $this->articleRepository = $articleRepository;
        $this->authorArticleRepository = $authorArticleRepository;

        $article = ($this->getRepository($request['type'])->getIdBySlug($request['slug']));

        if (!$article) {
            return abort(404);
        }

        $userId = Auth::id();
        $articleId = $article[0]['id'];

        $likeModel = new LikeModel('newsArticle', $articleId, $userId);

        $result = $likeModel->handleEmotion($request['plusEmotion']);

      return \Response::json($result);
    }

    private function getRepository($type) {

            switch ($type) {
                case 'author-article':
                    return $this->authorArticleRepository;

                case 'news':
                    return $this->articleRepository;
            }
    }
}
