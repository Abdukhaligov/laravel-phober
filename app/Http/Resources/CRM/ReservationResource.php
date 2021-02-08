<?php

namespace App\Http\Resources\CRM;

use App\Http\Resources\UserResource;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var Reservation $this */
    return [
      "id" => $this->id,
      "fullName" => $this->full_name,
      "phone" => $this->phone,
      "date" => $this->date,
      "playersCount" => $this->players_count,
      "playersAge" => $this->players_age,
      "note" => $this->note,
      "type" => $this->type,
      "createdBy" => new UserResource($this->author),
      "createdAt" => $this->created_at,
    ];
  }
}
