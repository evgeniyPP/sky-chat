<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->realText(15),
        'created_at' => now(),
        'user_id' => $faker->numberBetween(1, 10)
    ];
});
