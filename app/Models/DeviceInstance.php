<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use KirschbaumDevelopment\NovaComments\Commentable;

/**
 * @property Device device
 * @property bool active
 * @property Carbon deactivation_start
 * @property Carbon deactivation_end
 * @property integer device_id
 * @property int order
 */
class DeviceInstance extends Model{
  use ModelTrait, HasFactory, Commentable;

  const ACTIVE = true;
  const INACTIVE = false;
  protected $casts = [
    'active' => 'boolean',
    'deactivation_start' => 'datetime',
    'deactivation_end' => 'datetime',
  ];
  protected $fillable = ["device_id", "order"];
  protected $with = ["device"];

  public function device(){
    return $this->belongsTo(Device::class);
  }

  public function isActiveNow(){
    $now = new DateTime();
    $now = $now->format('Y-m-d h:m:s');

    if (!$this->active){
      if (!$this->deactivation_start && !$this->deactivation_end){
        return false;
      }
      elseif ($this->deactivation_start && $this->deactivation_end){
        if ($now > $this->deactivation_start && $now < $this->deactivation_end){
          return false;
        }
      }
      elseif (!$this->deactivation_start && $this->deactivation_end){
        if ($now < $this->deactivation_end){
          return false;
        }
      }
      elseif ($this->deactivation_start && !$this->deactivation_end){
        if ($now > $this->deactivation_start){
          return false;
        }
      }
      else{
        return true;
      }
    }

    return true;
  }
}
