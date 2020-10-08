<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer id
 * @property string name
 * @property double price
 * @property integer amount
 */
class Bar extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request){
    return [
      "id" => $this->id,
      "name" => $this->name,
      "price" => $this->price,
      "amount" => $this->amount,
    ];
  }
}
