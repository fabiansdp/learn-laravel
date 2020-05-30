<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender' => Arr::random(['male', 'female']),
        'age' => $faker->randomDigit($min=20, $max=70),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
