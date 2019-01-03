<?php

use Faker\Generator as Faker;
use App\User;
//This Factory will generate fake listings

$factory->define(App\Listing::class, function (Faker $faker) {

  $fakedtitle1 = $faker->secondaryAddress;
  $fakedtitle2 = $faker->streetName;
  $fakedtitle = $fakedtitle1.", ".$fakedtitle2;

    return [
      'title' => $fakedtitle,
      'desc' => $faker->text($maxNbChars = 249),
      'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 1000),
      'type' => $faker->randomElement($array = array('Shared','Private')),
      'location' => $faker->address,
      'user_id' => function(){
        return factory(App\User::class)->create()->id;
      },
    ];
});
