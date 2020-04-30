<?php

$factory->define(App\Program::class, function (Faker\Generator $faker) {
    return [
        "lessons" => $faker->name,
    ];
});
