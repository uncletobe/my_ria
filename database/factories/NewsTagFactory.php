<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News\NewsTag;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(NewsTag::class, function (Faker $faker) {

    $title = $faker->unique()->word;

    return [
        'parent_id' => rand(1, 13),
        'tag_title' => $title,
        'tag_slug' => Str::slug($title),
        'created_at' => Carbon::now()
    ];
});
