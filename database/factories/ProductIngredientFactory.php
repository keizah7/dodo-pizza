<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductIngredient;
use Faker\Generator as Faker;

$factory->define(ProductIngredient::class, function (Faker $faker) {
    return [
        'ingredient_id' => \App\Ingredient::pluck('id')->random(),
        'product_id' => \App\Product::pluck('id')->random(),
    ];
});
