<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'priority' => $faker->randomNumber(1),
        'type_id' => \App\Type::pluck('id')->random(),
    ];
});
