<?php

use Faker\Generator as Faker;
use App\User;
//This Factory will generate fake listings

$factory->define(App\Listing::class, function (Faker $faker) {
    return [
      'title' => $faker->secondaryAddress,
      'desc' => $faker->sentence,
      'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 1000),
      'type' => $faker->randomElement($array = array('Shared','Private')),
      'location' => $faker->address,
      'user_id' => function(){
        return factory(App\User::class)->create()->id;
      },
    ];
});
