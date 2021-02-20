<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'size_title' => $faker->words(2, true),
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(4, 0, 99),
        'discount' => 0,
        'priority' => $faker->randomDigit,
        'group_id' => \App\Group::pluck('id')->random(),
        'photo' => '/img/products/default.svg',
    ];
});
