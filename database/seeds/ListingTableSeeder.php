<?php

use Illuminate\Database\Seeder;
use App\Listing;
use App\User;

class ListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();
      Listing::truncate();
      factory(Listing::class, 10)->create();
    }
}
