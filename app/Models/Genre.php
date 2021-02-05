<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Collection games
 * @property string name
 */
class Genre extends Model{
  use ModelTrait, HasFactory;

  public function games(){
    return $this->belongsToMany(Game::class, "game_genre");
  }
}
