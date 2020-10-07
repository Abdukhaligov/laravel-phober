<?php

namespace App\Models;

use App\Loggable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method static find($id)
 * @method static create(array $array)
 * @property int id
 * @property string username
 * @property string email
 * @property mixed full_name
 * @property Collection roles
 */
class User extends Authenticatable{
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
  const ROLE = [
    "Admin" => 1,
    "Manager" => 2,
    "Cashier" => 3,
    "Member" => 4,
  ];

  public function roles(){
    return $this->belongsToMany(Role::class, "user_role");
  }

  public function isAdmin(){
    return in_array(self::ROLE["Admin"], (array)$this->roles->pluck('id')->toArray());
  }

  public function isManager(){
    return in_array(self::ROLE["Manager"], (array)$this->roles->pluck('id')->toArray());
  }

  public function isCashier(){
    return in_array(self::ROLE["Cashier"], (array)$this->roles->pluck('id')->toArray());
  }

  public function isMember(){
    return in_array(self::ROLE["Member"], (array)$this->roles->pluck('id')->toArray());
  }
}
