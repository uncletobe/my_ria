<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
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

$factory->define(User::class, function (Faker $faker) {

    $roleId = 4;
    $rand = rand(1, 10);

    if($rand == 1) {
        $roleId = 2;
    } elseif ($rand == 2) {
        $roleId = 3;
    }


    $data = [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password(6), // password
        'avatar' => $faker->imageUrl($width = 200, $height = 200, 'cats'),
        'role_id' => $roleId,
        'is_banned' => ($rand < 8) ? 0 : 1,
        'remember_token' => Str::random(10),
        'confirm_token' => Str::random(15),
    ];

    return $data;
});
