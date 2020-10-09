<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Collection;
use DateTime;

/**
 * @property int id
 * @property string name
 * @property string slug
 * @property int rating
 * @property bool multiplayer
 * @property string video
 * @property string description
 * @property Collection games
 * @property Collection devices
 * @property array comments
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static find($id)
 * @method getTranslations(string $string)
 * @method getFirstMediaUrl(string $collectionName)
 */
class Game extends Model implements HasMedia{
  use HasTranslations, InteractsWithMedia, Commentable;

  public $translatable = ["description"];
  protected $casts = [
    "multiplayer" => "boolean"
  ];

  public function registerMediaCollections(): void{
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
