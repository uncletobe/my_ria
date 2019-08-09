<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News\NewsComment;
use Faker\Generator as Faker;

$factory->define(NewsComment::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'article_id' => rand(1, 100),
        'comment_raw' => $faker->text(rand(50, 350)),
    ];
});
