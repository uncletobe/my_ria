<?php

use Illuminate\Database\Seeder;

class NewsArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\News\NewsArticle::class, 100)->create();
    }
}
