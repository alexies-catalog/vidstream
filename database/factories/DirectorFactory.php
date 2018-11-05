<?php

use App\Director;
use Faker\Generator as Faker;

$factory->define(Director::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'awards'=>$faker->text,
        'about'=>$faker->text,
        'halloffame'=>$faker->freeEmailDomain ,
        'profilepic'=>$faker->numberBetween($min = 1, $max = 15).'.jpg',
    ];
});
