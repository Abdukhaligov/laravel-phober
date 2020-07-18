<?php

namespace App;

use App\Models\Logs;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Loggable {
  /**
   * @return MorphMany
   */
  public function logs() {
    return $this->morphMany(Logs::class, 'loggable');
  }
}