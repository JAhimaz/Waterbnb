<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use App\Services\ListingService;

class ListingsController extends Controller
{
  private $listingService;

  public function __construct(ListingService $listingService){
    $this->listingService = $listingService;
  }

  public function index(Request $request){
    if ($request->wantsJson()){
      return $this->listingService->all($request);
    }
    return view('listing.index');
  }

  public function create(Request $request){
    return view('listing.create');
  }

  public function store(Request $request){
    return $this->listingService->store($request);
  }

  public function edit(Listing $listing){
    return view('listing.edit', ['listing' => $listing]);
  }

  public function update(Request $request, Listing $listing){
    return $this->listingService->update($request, $listing);
  }

  public function destroy(Listing $listing){
    return $this->listingService->destroy($listing);
  }
}
