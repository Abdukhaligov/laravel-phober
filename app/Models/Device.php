<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Collection;
use DateTime;
use KirschbaumDevelopment\NovaComments\Commentable;

/**
 * @property int id
 * @property string name
 * @property string slug
 * @property string description
 * @property Collection games
 * @property array comments
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static find($id)
 */
class Device extends Model{
  use HasTranslations;
  use Commentable;

  public $translatable = ['description'];
  protected $hidden = ['created_at', 'updated_at'];

  public function games(){
    return $this->belongsToMany(Game::class, "game_device");
  }
}
