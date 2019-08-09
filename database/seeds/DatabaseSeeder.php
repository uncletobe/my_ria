<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 100)->create();
        $this->call(NewsArticlesSeeder::class);
        $this->call(NewsCategoriesSeeder::class);
        factory(\App\Models\News\NewsPicture::class, 500)->create();
        $this->call(NewsTagsSeeder::class);
        $this->call(ArticleTagsSeeder::class);
        factory(\App\Models\News\NewsComment::class, 100)->create();
    }
}
