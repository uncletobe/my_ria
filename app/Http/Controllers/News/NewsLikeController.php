<?php

namespace App\Http\Controllers\News;

use App\Extensions\Redis\LikeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ArticleRepository;

class NewsLikeController extends Controller
{
    private $articleRepository;
    private $availablesTypes = [

        ];

    public function addAssessment(Request $request, ArticleRepository $articleRepository) {
        

        $this->articleRepository = $articleRepository;
        $article = ($this->articleRepository->getIdBySlug($request['slug']));

        if (!$article) {
            return abort(404);
        }

        $userId = Auth::id();
        $articleId = $article[0]['id'];

        $likeModel = new LikeModel('newsArticle', $articleId, $userId);

        $result = $likeModel->handleEmotion($request['plusEmotion']);

      return \Response::json($result);
    }
}
