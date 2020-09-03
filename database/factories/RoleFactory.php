<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\role;
use Faker\Generator as Faker;

$factory->define(role::class, function (Faker $faker) {
    $faker->addProvider(new \Xylis\FakerCinema\Provider\Character($faker));
    return [
        //
        'role'=>$faker->character($gender = null)
    ];
});
