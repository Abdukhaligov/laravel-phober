<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string full_name
 * @property string phone
 * @property Carbon date
 * @property integer players_count
 * @property integer players_age
 * @property string note
 * @property ReservationType type
 * @property User author
 */
class Reservation extends Model{
  use Authorable, ModelTrait, HasFactory;

  protected $fillable = [
    "full_name", "phone", "date", "players_count", "players_age"
  ];
  protected $casts = [
    "date" => "datetime"
  ];

  public function type(){
    return $this->belongsTo(ReservationType::class, "type_id");
  }

  public function deviceInstances(){
    return $this->belongsToMany(DeviceInstance::class, "device_instance_reservation");
  }
}
