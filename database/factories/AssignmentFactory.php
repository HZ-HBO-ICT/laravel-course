<?php

use Faker\Generator as Faker;

$factory->define(App\Assignment::class, function (Faker $faker) {
    return [
        'project_name' => $faker->word,
        'image_url' => $faker->imageUrl($width = 400, $height= 300, 'technics'),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
