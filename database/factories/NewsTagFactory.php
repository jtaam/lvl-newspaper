<?php

use Faker\Generator as Faker;

$factory->define(App\Models\News\NewsTag::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->word,
        'slug'=>$faker->slug(1),
        'description'=>$faker->paragraph
    ];
});
