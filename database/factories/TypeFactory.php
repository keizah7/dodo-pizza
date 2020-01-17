<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'priority' => $faker->randomNumber(1),
    ];
});
