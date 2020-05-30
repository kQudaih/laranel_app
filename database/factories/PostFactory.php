<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use BestBlog\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'body' => $faker->sentence(1),

    ];
});
