<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News\NewsTag;
use Faker\Generator as Faker;

$factory->define(NewsTag::class, function (Faker $faker) {

    $title = $faker->word;

    return [
        'tag_title' => $title,
        'tag_slug' => Str::slug($title),
    ];
});
