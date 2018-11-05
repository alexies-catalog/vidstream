<?php

use App\Equipment;
use Faker\Generator as Faker;

$factory->define(Equipment::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'description'=>$faker->text,
        'affiliates'=>$faker->freeEmailDomain ,
        'img'=>$faker->firstname.'.jpg',
    ];
});
