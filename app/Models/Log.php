<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @method static create(array $array)
 */
class Log extends Model {
  protected $fillable = [
      'body', 'ip', 'url', 'action', 'author_id'
  ];

  /**
   * @return MorphTo
   */
  public function loggable() {
    return $this->morphTo();
  }
}
