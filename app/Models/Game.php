<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * @property string name
 * @property string slug
 * @property int rating
 * @property bool multiplayer
 * @property string video
 * @property string description
 * @property Collection games
 * @property Collection devices
 * @property Collection genres
 * @property array comments
 */
class Game extends Model implements HasMedia{
  use ModelTrait, HasFactory, InteractsWithMedia, Commentable, HasTranslations;

  public $translatable = ["description"];
  protected $casts = ["multiplayer" => "boolean"];
  protected $with = ["media"];

  public function registerMediaCollections(): void{
    $this
      ->addMediaCollection('preview')
      ->useDisk('media');
  }

  public function genres(){
    return $this->belongsToMany(Genre::class, "game_genre");
  }

  public function devices(){
    return $this->belongsToMany(Device::class, "game_device");
  }
}
