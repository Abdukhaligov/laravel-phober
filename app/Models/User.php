<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property string first_name
 * @property string last_name
 * @property string username
 * @property string email
 * @property Collection roles
 */
class User extends Authenticatable{
  use ModelTrait, HasFactory, Notifiable, HasRoles, HasApiTokens;

  protected $fillable = ['username', 'first_name', 'last_name', 'email', 'password',];
  protected $hidden = ['password', 'remember_token',];
  protected $casts = ['email_verified_at' => 'datetime',];

  public function isRoot(): bool{
    try{
      return in_array(Role::where("name", "Root")->first()->id,
        (array) $this->roles->pluck('id')->toArray());
    } catch (\Exception $e){
      return false;
    }
  }
}
