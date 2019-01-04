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
      'user_id' => $listing->user_id,
      'rentor_name' => $listing->user->name
    ];
  }

  public function store($request){
    $data = $request->validate([
      'title' => 'required|string|min:1|max:28',
      'desc' => 'required|string|min:10|max:250',
      'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
      'type' => 'required',
      'location' => 'required',
    ]);

		$listing = Listing::create([
      'title' => $data["title"],
      'desc' => $data["desc"],
      'price' => $data["price"],
      'type' => $data["type"],
      'location' => $data["location"],
      'rentor_name' => auth()->user()->name,
      'user_id' => auth()->user()->id,
    ]);

    return redirect()->route('listing.index');
  }

  public function update(Request $request, Listing $listing){
  $data = $request->validate([
    'title' => 'required|string|min:1|max:28',
    'desc' => 'required|string|min:10|max:250',
    'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
    'type' => 'required',
    'location' => 'required',
  ]);

  $listing->title = $data['title'];
  $listing->desc = $data["desc"];
  $listing->price = $data["price"];
  $listing->type = $data["type"];
  $listing->location = $data["location"];
  $listing->rentor_name = auth()->user()->name;
  $listing->save();

  return redirect()->route('listing.index');
  }

  public function destroy(Listing $listing){
  $listing->delete();

  return response()->json('deleted');
  }
}
