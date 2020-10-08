<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer id
 * @property integer number
 * @property integer balance
 * @property \App\Models\Customer owner
 * @property int owner_id
 */
class CustomerCard extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param \Illuminate\Http\Request $request
   * @return array
   */
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
