<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Game extends Model {
  use HasTranslations;
  public $translatable = ['description'];

  public function genres(){
    return $this->belongsToMany(Genre::class, "game_genre");
  }

  public function devices(){
    return $this->belongsToMany(Device::class, "game_device");
  }
}
