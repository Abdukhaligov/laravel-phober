<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int id
 * @property string full_name
 * @property string phone
 * @property DateTime date
 * @property string player_count
 * @property string years_old
 * @property string type
 * @property string note
 * @property User author
 * @property int author_id
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static find($id)
 * @method static create(array $all)
 */
class Reservation extends Model{
  protected $fillable = [
    "full_name", "phone", "date", "player_count", "years_old", "type"
  ];
  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }
}
