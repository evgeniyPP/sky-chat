<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(100),
        'user_id' => $faker->numberBetween(1, 10),
        'group_id' => $faker->numberBetween(1, 10),
        'created_at' => now(),
    ];
});
