<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int id
 * @property string username
 * @property string email
 * @property mixed full_name
 * @property Collection roles
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static create(array $attributes)
 * @method static find($id)
 */
class User extends Authenticatable{
  use HasFactory, Notifiable, HasRoles;

  const ROLE = [
    "Super Admin" => 1,
    "Admin" => 2,
    "Manager" => 3,
    "Cashier" => 4,
    "Member" => 5,
  ];
  protected $fillable = [
    'name',
    'email',
    'password',
  ];
  protected $hidden = [
    'password',
    'remember_token',
  ];
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function isRoot(): bool{
    return in_array(self::ROLE["Super Admin"],
      (array) $this->roles->pluck('id')->toArray());
  }

  public function isAdmin(){
    return in_array(self::ROLE["Admin"],
      (array) $this->roles->pluck('id')->toArray());
  }

  public function isManager(){
    return in_array(self::ROLE["Manager"],
      (array) $this->roles->pluck('id')->toArray());
  }

  public function isCashier(){
    return in_array(self::ROLE["Cashier"],
      (array) $this->roles->pluck('id')->toArray());
  }

  public function isMember(){
    return in_array(self::ROLE["Member"],
      (array) $this->roles->pluck('id')->toArray());
  }
}
