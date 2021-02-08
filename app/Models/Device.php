<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use Spatie\Translatable\HasTranslations;

/**
 * @property string name
 * @property string slug
 * @property string description
 * @property Collection games
 * @property array comments
 * @property Collection $instances
 */
class Device extends Model{
  use ModelTrait, HasTranslations, Commentable;

  public $translatable = ['description'];
  protected $hidden = ['created_at', 'updated_at'];

  public function games(){
    return $this->belongsToMany(Game::class, "game_device");
  }

  public function instances(){
    return $this->hasMany(DeviceInstance::class);
  }

  public function getNextOrderVal(){
    /** @var DeviceInstance $instance */
    if($instance = $this->instances()->orderBy('order', 'DESC')->get()->first()){
      return $instance->order + 1;
    }

    return 1;
  }
}
