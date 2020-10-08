<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use DateTime;

/**
 * @property integer id
 * @property bool active
 * @property array comments
 * @property Device device
 * @property DateTime deactivation_start
 * @property DateTime deactivation_end
 * @method static find($id)
 */
class Instance extends Model{
  use Commentable;

  const ACTIVE = TRUE;
  const INACTIVE = FALSE;
  protected $casts = [
    'active' => 'boolean',
    'deactivation_period_start' => 'datetime',
    'deactivation_period_end' => 'datetime',
  ];

  public function device(){
    return $this->belongsTo(Device::class);
  }

  public function isActiveNow(){
    $now = new DateTime();
    $now = $now->format('Y-m-d h:m:s');

    if(!$this->active){
      if(!$this->deactivation_start && !$this->deactivation_end){
        return FALSE;
      }elseif($this->deactivation_start && $this->deactivation_end){
        if($now > $this->deactivation_start && $now < $this->deactivation_end){
          return FALSE;
        }
      }elseif(!$this->deactivation_start && $this->deactivation_end){
        if($now < $this->deactivation_end){
          return FALSE;
        }
      }elseif($this->deactivation_start && !$this->deactivation_end){
        if($now > $this->deactivation_start){
          return FALSE;
        }
      }else{
        return TRUE;
      }
    }

    return TRUE;
  }
}
