<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var Customer $this */
    return [
      "id" => $this->id,
      "firstName" => $this->first_name,
      "lastName" => $this->last_name,
      "phone" => $this->phone,
      "email" => $this->email,
      "gender" => $this->gender ? "Male" : "Female",
      "birthday" => $this->birthday,
      "age" => $this->getAge(),
      "nextBirthday" => $this->getNextBirthday(),
    ];
  }
}
