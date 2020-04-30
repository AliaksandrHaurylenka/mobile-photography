<?php

$factory->define(App\Portfolio::class, function (Faker\Generator $faker) {
    return [
        "category_id" => factory('App\Category')->create(),
    ];
});
