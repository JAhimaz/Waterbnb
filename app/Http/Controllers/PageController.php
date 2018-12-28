<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use App\Services\ListingService;

class PageController extends Controller
{
  private $listingService;

  public function __construct(ListingService $listingService){
    $this->listingService = $listingService;
  }

  public function index(Request $request)
  {
    if ($request->wantsJson()){
      return $this->listingService->all($request);
    }
    return view('listing.index');
  }

  public function store(Request $request)
  {
      //
  }

  public function show($id)
  {
      //
  }

  public function edit($id)
  {
      //
  }

  public function update(Request $request, $id)
  {
      //
  }

  public function destroy($id)
  {
      //
  }
}
