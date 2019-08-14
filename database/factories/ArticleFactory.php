<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\News\NewsArticle;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(NewsArticle::class, function (Faker $faker) {

        $title = $faker->sentence(rand(5, 10), true);
        $txt = $faker->realText(rand(2000, 4000));
        $isPublished = rand(1, 5) > 1;
        $is_main_news = rand(1, 10) < 2;
        $is_recommend = rand(1, 10) < 2;

        $createdAt = $faker->dateTimeBetween('-10 day', 'now');

        $data = [
            'article_title'  => $title,
            'article_slug' => Str::slug($title),
            'article_excerpt'      => $faker->text(rand(50, 70)),
            'article_content_raw'  => $txt,
            'article_content_html' => $txt,
            'is_main_news' => $is_main_news,
            'article_picture_preview_path' => "path:\C:\\" . Str::slug($title, "\\"),
            'alt' => $faker->sentence(rand(3, 10)),
            'is_published' => $isPublished,
            'published_at' => $isPublished ? $faker->dateTimeBetween('-10 day', 'now') : null,
            'is_recommend' => $is_recommend,
            'created_at'   => $createdAt,
            'updated_at'   => $createdAt,

        ];

        return $data;
});
