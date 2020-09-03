<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\genre;
use Faker\Generator as Faker;

$factory->define(genre::class, function (Faker $faker) {
    $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
    return [
        //
        'genre'=>$faker->movieGenre

    ];
});
