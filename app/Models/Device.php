<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use Spatie\Translatable\HasTranslations;

/**
 * @property int id
 * @property string name
 * @property string slug
 * @property string description
 * @property Collection games
 * @property array comments
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static create(array $attributes)
 * @method static find($id)
 * @method getTranslations(string $string)
 */
class Device extends Model{
  use HasTranslations, Commentable;

  public $translatable = ['description'];
  protected $hidden = ['created_at', 'updated_at'];

  public function games(){
    return $this->belongsToMany(Game::class, "game_device");
  }
}
