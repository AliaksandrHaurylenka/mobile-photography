<?php

$factory->define(App\Price::class, function (Faker\Generator $faker) {
    return [
        "price" => $faker->randomNumber(2),
        "currency" => $faker->name,
    ];
});
