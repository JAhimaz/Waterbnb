<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  const ADMIN_TYPE = 'admin';
  const DEFAULT_TYPE = 'default';

  public function isAdmin()    {
      return $this->type === self::ADMIN_TYPE;
  }

  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  public static function boot(){
    parent::boot();

    static::creating(function($user){
      $user->password = bcrypt($user->password);
    });
  }

  //Relation methods
  public function listings(){
    return $this->hasMany('App\Listings');
  }
}
