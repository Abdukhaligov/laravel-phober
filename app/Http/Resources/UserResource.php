<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var User $this */
    return [
      "id" => $this->id,
      "username" => $this->username,
      "firstName" => $this->first_name,
      "lastName" => $this->last_name,
      "email" => $this->email,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }
}
