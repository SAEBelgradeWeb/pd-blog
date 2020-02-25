<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(3, true), 0, -1),
        'body' => $faker->paragraphs(5, true),
        'image' => '/images/sport.jpg',
        'user_id' => $faker->numberBetween(1, 50),
        'category_id' => $faker->numberBetween(1, 5)
    ];
});
