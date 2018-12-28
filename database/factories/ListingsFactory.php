<?php

use Faker\Generator as Faker;

//This Factory will generate fake listings

$factory->define(App\Listing::class, function (Faker $faker) {
    return [
      'title' => $faker->secondaryAddress,
      'desc' => $faker->sentence,
      'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 1000),
      'type' => $faker->randomElement($array = array('Shared','Private')),
      'location' => $faker->address,
      'rentor_name' => $faker->name,
    ];
});
