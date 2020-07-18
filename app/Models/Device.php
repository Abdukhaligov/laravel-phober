<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Device extends Model {
  use HasTranslations;

  public $translatable = ['description'];

  protected $hidden = ['created_at', 'updated_at'];

  public function games() {
    return $this->belongsToMany(Game::class, "game_device");
  }
}
