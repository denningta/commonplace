<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
            'title' => $faker->catchPhrase,
            'type' => $faker->word,
            'subject' => $faker->sentence,
            'book_title' => $faker->catchPhrase,
            'book_author' => $faker->name,
            'page' => $faker->numberBetween(1, 1000),
            'body' => $faker->text(1000), 
            'user_id' => 1
    ];
});
