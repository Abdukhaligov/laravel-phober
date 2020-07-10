<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Game extends Model implements HasMedia  {
  use HasTranslations, InteractsWithMedia;
  public $translatable = ['description'];

  public function registerMediaCollections(): void {
    $this
        ->addMediaCollection('game')
        ->useDisk('media');
  }

  public function genres(){
    return $this->belongsToMany(Genre::class, "game_genre");
  }

  public function devices(){
    return $this->belongsToMany(Device::class, "game_device");
  }
}
