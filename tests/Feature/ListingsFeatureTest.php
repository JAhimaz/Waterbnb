<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Listing;

/**
 * A basic test example.
 *
 * @group listing_test
 */

class ListingsFeatureTest extends TestCase{

  use RefreshDatabase;

  /**
   * @test
   */
   public function it_should_get_listings(){
     $listings = factory('App\Listing', 5)->create();

     $response = $this->json('GET', '/listings');

     $response->assertStatus(200)
              ->assertJsonCount(5);
   }

   /**
    * @test
    */
   public function it_should_create_listing(){
     $user = factory('App\User')->create();
     $listings = factory('App\Listing')->make();

     $response = $this->actingAs($user)
                      ->post('listings', [
                      'title' => $listings->title,
                      'desc' => $listings->desc,
                      'price' => $listings->price,
                      'type' => $listings->type,
                      'location' => $listings->location,
                     ]);

     $response->assertStatus(302);

     echo $response->getContent();
     //
     // echo Listing::where('title', $listings->title)->first();
     //
     // $this->assertTrue(Listing::where('title', $listings->title)->first() != null);
  }
}

/*
 * Create fake user for test
 * See if able to gather Listings
 *
 *
 */
