<?php

use Illuminate\Database\Seeder;
use App\Listing;

class ListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Listing::truncate();
      factory(Listing::class, 20)->create();
    }
}
