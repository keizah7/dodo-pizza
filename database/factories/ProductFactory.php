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
        'type_id' => \App\Type::all()->random()->id,
        'group_id' => \App\Group::all()->random()->id,
        'photo' => '/img/products/default.svg',
    ];
});
