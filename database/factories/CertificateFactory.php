<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\certificate;
use Faker\Generator as Faker;

$factory->define(certificate::class, function (Faker $faker) {
    return [
        'certificate'=>$faker->sentence(2)

    ];
});
