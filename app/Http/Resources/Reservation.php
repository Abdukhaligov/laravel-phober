<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
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
 * @property \App\Models\User author
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Reservation extends JsonResource{
  public function toArray($request){
    return [
      "id" => $this->id,
      "full_name" => $this->full_name,
      "phone" => $this->phone,
      "date" => $this->date,
      "player_count" => $this->player_count,
      "years_old" => $this->years_old,
      "type" => $this->type,
      "note" => $this->note,
      "author" => array(
        "name" => $this->author->full_name,
        "email" => $this->author->email
      ),
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }
}
