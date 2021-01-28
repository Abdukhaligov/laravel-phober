<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static create(array $attributes)
 * @method static find($id)
 */
class Genre extends Model{
  use HasFactory;

  public function games(){
    return $this->belongsToMany(Game::class, "game_genre");
  }
}
