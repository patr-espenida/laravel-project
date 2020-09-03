<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\film;
use Faker\Generator as Faker;

    $factory->define(film::class, function (Faker $faker) {
        return [
            //
            'title'=>$faker->movie,
            'story'=>$faker->overview,
            'release_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'duration'=>$faker->time($format = 'H:i:s'),
            'certificate_id'=> App\certificate::inRandomOrder()->first()->getKey(),
            'genre_id'=> App\genre::inRandomOrder()->first()->getKey()

        ];
    });
