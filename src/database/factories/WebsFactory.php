<?php

use Faker\Generator as Faker;

$factory->define(Ales0sa\WebPortfolio\Webs::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'body' => $faker->paragraph,
        
    ];
});
