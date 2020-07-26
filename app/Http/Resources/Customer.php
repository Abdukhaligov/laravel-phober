<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource {
  public function toArray($request) {
    $birthday = new DateTime($this->birthday);
    $now = new DateTime();
    $interval = $now->diff($birthday);
    $temp = new DateTime(date_format($birthday, 'Y-m-d'));
    $temp->setDate($now->format('Y'), $temp->format('m'), $temp->format('d'));
    $temp = date_diff($now, $temp);

    return [
        "id" => $this->id,
        "name" => $this->name,
        "phone" => $this->phone,
        "email" => $this->email,
        "gender" => $this->gender ? "Male" : "Female",
        "birthday" => date('d-m-Y', strtotime($this->birthday)),
        "next_birthday" => !$temp->invert ? $temp->days + 1 : 'Already passed',
        "age" => $interval->y,
        "created_at" => date('h:m:s d-m-Y', strtotime($this->created_at)),
        "author" => array(
            "name" => $this->author->full_name,
            "email" => $this->author->email
        ),
        "updated_at" => date('h:m:s d-m-Y', strtotime($this->updated_at)),
    ];
  }
}
