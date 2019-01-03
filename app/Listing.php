<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  protected $fillable = [
    'title','desc','price','type','location', 'rentor_name', 'user_id',
  ];

}
