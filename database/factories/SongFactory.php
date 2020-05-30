<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'artist_id' => $faker->numberBetween(1, 10),
        'title' => $faker->name,
        'genre' => $faker->randomElement(['Pop', 'Rock', 'Jazz', 'K-Pop', 'Blues']),
        'year' => $faker->year($max = 'now'),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
