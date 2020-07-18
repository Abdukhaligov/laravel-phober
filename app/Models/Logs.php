<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Logs extends Model {
  protected $fillable = [
      "body", "ip"
  ];
  /**
   * @return MorphTo
   */
  public function loggable() {
    return $this->morphTo();
  }
}
