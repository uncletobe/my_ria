<?php

use Illuminate\Database\Seeder;

class AuthorArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = \App\Models\User::
        where(['role_id' => 3])
            ->pluck('id')
            ->toArray();

        $authorArticles = factory(App\Models\News\AuthorArticle::class, 100)
            ->make()
            ->each(function ($aArticle) use ($userIds) {
                $aArticle->author_id = $userIds[rand(0, count($userIds) - 1)];
            })->toArray();

        \App\Models\News\AuthorArticle::insert($authorArticles);
    }
}
