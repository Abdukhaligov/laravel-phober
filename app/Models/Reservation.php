<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model{
  use ModelTrait, HasFactory;

  protected $fillable = [
    "full_name", "phone", "date", "players_count", "players_age"
  ];
  protected $casts = [
    "date" => "datetime"
  ];

  public function type(){
    return $this->belongsTo(ReservationType::class, "type_id");
  }

  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }

  public function deviceInstances(){
    return $this->belongsToMany(DeviceInstance::class, "device_instance_reservation");
  }
}
