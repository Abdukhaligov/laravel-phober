<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use DateTime;

/**
 * @property integer id
 * @property integer number
 * @property integer balance
 * @property \App\Models\Customer owner
 * @property int owner_id
 * @property User author
 * @property int author_id
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class CustomerCard extends JsonResource{
  public function toArray($request){
    return [
      "id" => $this->id,
      "number" => $this->number,
      "balance" => $this->balance,
      "owner" => $this->owner,
      "created_at" => date('h:m:s d-m-Y', strtotime($this->created_at)),
      "updated_at" => date('h:m:s d-m-Y', strtotime($this->updated_at)),
    ];
  }
}
