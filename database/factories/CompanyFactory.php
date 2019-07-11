<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Campany;
use Faker\Generator as Faker;

$factory->define(Campany::class, function (Faker $faker) {
    return [

        'name' => $faker-> Company,
        'phone' => $faker-> phoneNumber,
    ];
});
