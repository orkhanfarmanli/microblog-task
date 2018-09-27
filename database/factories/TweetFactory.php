<?php

use Faker\Generator as Faker;

$factory->define(App\Tweet::class, function (Faker $faker) {
    return [
        "body" => $faker->text,
        "user_id" => $faker->numberBetween(1, 50)
    ];
});
