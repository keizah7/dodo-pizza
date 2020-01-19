<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pickup;
use Faker\Generator as Faker;

$factory->define(Pickup::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'address' => $faker->address,
        'description' => $faker->paragraph,
    ];
});
