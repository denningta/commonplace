<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
            'title' => $faker->catchPhrase,
            'author' => $faker->name,
            'publisher' => $faker->company,
            'year' => $faker->year($max = 'now'),
            'affiliate_link' => '',
            'affiliate_image' => '',

    ];
});
