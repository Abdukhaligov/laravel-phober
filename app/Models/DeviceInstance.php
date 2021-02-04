<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Collection device
 */
class DeviceInstance extends Model{
  use ModelTrait, HasFactory;

  const ACTIVE = true;
  const INACTIVE = false;
  protected $casts = [
    'active' => 'boolean',
    'deactivation_start' => 'datetime',
    'deactivation_end' => 'datetime',
  ];
  protected $fillable = ["device_id"];

  public function device(){
    return $this->belongsTo(Device::class);
  }
}
