<?php

use App\Producer;
use Faker\Generator as Faker;

$factory->define(Producer::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'awards'=>$faker->text,
        'about'=>$faker->text,
        'halloffame'=>$faker->freeEmailDomain ,
        'profilepic'=>$faker->numberBetween($min = 1, $max = 16).'.jpg',
    ];
});
