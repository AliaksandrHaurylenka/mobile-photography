<?php

$factory->define(App\MainMenu::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "link" => $faker->name,
    ];
});
