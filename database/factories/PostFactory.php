<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
            'title' => $faker->catchPhrase,
            'type' => $faker->word,
            'book_id' => $faker->numberBetween(1, 100),
            'page' => $faker->numberBetween(1, 1000),
            'body' => $faker->text(1000), 
            'user_id' => $faker->numberBetween(1, 101),
    ];
});
