<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\producer;
use Faker\Generator as Faker;

$factory->define(producer::class, function (Faker $faker) {
    $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));
    return [
        //
        'name'=>$faker->director,
        'email'=>$faker->email,
        'website'=>$faker->domainName
    ];
});
