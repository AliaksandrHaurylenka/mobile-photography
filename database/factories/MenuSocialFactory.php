<?php

$factory->define(App\MenuSocial::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "link" => $faker->name,
    ];
});
