<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\actor_role;
use Faker\Generator as Faker;

$factory->define(actor_role::class, function (Faker $faker) {
    return [

        'description'=>$faker->text,
        'actor_id'=> App\actor::inRandomOrder()->first()->getKey(),
        'role_id'=> App\role::inRandomOrder()->first()->getKey(),
        'film_id'=> App\film::inRandomOrder()->first()->getKey(),
    ];

});
