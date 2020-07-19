<?php

namespace App\Models;

use App\Loggable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {
  use HasApiTokens, Notifiable, Loggable;

  protected $fillable = [
      'email', 'password', 'full_name'
  ];

  protected $hidden = [
      'password', 'remember_token',
  ];

  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function roles() {
    return $this->belongsToMany(Role::class, "user_role");
  }

  public function isAdmin(){
   return in_array(1,(array)$this->roles->pluck('id')->toArray());
  }

  public function isManager(){
   return in_array(2,(array)$this->roles->pluck('id')->toArray());
  }

  public function isCashier(){
   return in_array(3,(array)$this->roles->pluck('id')->toArray());
  }

  public function isMember(){
   return in_array(4,(array)$this->roles->pluck('id')->toArray());
  }
}
