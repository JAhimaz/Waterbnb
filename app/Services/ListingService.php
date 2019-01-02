<?php

namespace App\Services;

use App\Listing;
use Illuminate\Http\Request;

class ListingService extends TransformerService{

  public function all(Request $request){
    $type = $request->type != "All" && $request->type != null ? $request->type : '';
    $title = $request->title ? $request->title : '';

    $listings = Listing::where('title', 'like', "%{$title}%");
    if($request->type !="All" && $request->type != null){
      $listings = $listings->where("type", $request->type);
    }
    // if($request->has("type") && $request->type != "All"){
    //   $listing = Listing::where("type", $request->type)->get();
    // }else{
    //   $listing = Listing::all();
    // }
    return response($this->transformCollection($listings->get()));
  }

  public function transform($listing){
    return [
      'id' => $listing->id,
      'title' => $listing->title,
      'desc' => $listing->desc,
      'price' => $listing->price,
      'type' => $listing->type,
      'location' => $listing->location,
      'rentor_name' => $listing->rentor_name
    ];
  }

  public function store(){
    $data = $request->validate([
      'title' => 'required|string|min:1|max:28',
      'desc' => 'required|string|min:10|max:250',
      'price' => 'required|numeric|digits_between:10.00,9999.99',
      'type' => 'required',
      'location' => 'required',
      'rentor_name' => 'required'
    ]);

    dd(current_user());

		Todo::create([
      'title' => $data['title'],
      'user_id' => current_user()->id
    ]);

    return response()->json('Stored');
  }
}
