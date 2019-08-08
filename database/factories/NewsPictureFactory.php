<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News\NewsPicture;
use Faker\Generator as Faker;

$factory->define(NewsPicture::class, function (Faker $faker) {
    return [
        'news_picture_path' => Str::slug($faker->sentence(rand(5, 10), true)),
    ];
});
