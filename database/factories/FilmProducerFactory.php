<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\film_producer;
use Faker\Generator as Faker;

$factory->define(film_producer::class, function (Faker $faker) {
        return [
            //
            'film_id'=> App\film::inRandomOrder()->first()->getKey(),
            'producer_id'=> App\producer::inRandomOrder()->first()->getKey(),
        ];

});
