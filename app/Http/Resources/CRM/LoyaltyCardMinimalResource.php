<?php

namespace App\Http\Resources\CRM;

use App\Models\Cards\LoyaltyCard;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoyaltyCardMinimalResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var LoyaltyCard $this */
    return[
      "id" => $this->id,
      "number" => $this->number,
      "owner" => new CustomerResource($this->owner)
    ];
  }
}
