<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News\NewsPicture;
use Faker\Generator as Faker;

$factory->define(NewsPicture::class, function (Faker $faker) {
    return [
        'news_picture_path' => "path:\C:\\" . Str::slug($faker->sentence(rand(5, 10), true), '\\'),
        'news_picture_alt' => $faker->sentence(rand(3, 10)),
        'article_id' => rand(1, 500),
    ];
});
