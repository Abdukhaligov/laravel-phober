<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use DateTime;

class Instance extends Model {
  use Commentable;

  protected $casts = [
      'deactivation_period_start' => 'datetime',
      'deactivation_period_end' => 'datetime',
  ];

  public function device() {
    return $this->belongsTo(Device::class);
  }

  public function status() {
    $now = new DateTime();
    $now = $now->format('Y-m-d h:m:s');

    if (!$this->active) {
      if (!$this->deactivation_start && !$this->deactivation_end) {
        return false;
      } elseif ($this->deactivation_start && $this->deactivation_end) {
        if ($now > $this->deactivation_start && $now < $this->deactivation_end) {
          return false;
        }
      } elseif (!$this->deactivation_start && $this->deactivation_end) {
        if ($now < $this->deactivation_end) {
          return false;
        }
      } elseif ($this->deactivation_start && !$this->deactivation_end) {
        if ($now > $this->deactivation_start) {
          return false;
        }
      } else {
        return true;
      }
    }

    return true;
  }
}
