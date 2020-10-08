<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int id
 * @property string name
 * @property string phone
 * @property string email
 * @property bool gender
 * @property mixed birthday
 * @property \App\Models\User author
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Customer extends JsonResource{
  public function toArray($request){
    $now = new DateTime();
    try{
      $birthday = new DateTime($this->birthday);
      $age = $now->diff($birthday);
      $age = $age->y;
      $temp = new DateTime(date_format($birthday, 'Y-m-d'));
      $temp->setDate($now->format('Y'), $temp->format('m'), $temp->format('d'));
      $temp = date_diff($now, $temp);
    }catch(\Exception $e){
      return ["id" => $this->id, "message" => "Problem with birthday", "error" => $e];
    }

    return [
      "id" => $this->id,
      "name" => $this->name,
      "phone" => $this->phone,
      "email" => $this->email,
      "gender" => $this->gender? "Male": "Female",
      "birthday" => date('d-m-Y', strtotime($this->birthday)),
      "next_birthday" => !$temp->invert? $temp->days + 1: 'Already passed',
      "age" => $age,
      "author" => array(
        "name" => $this->author->full_name,
        "email" => $this->author->email
      ),
      "created_at" => date('h:m:s d-m-Y', strtotime($this->created_at)),
      "updated_at" => date('h:m:s d-m-Y', strtotime($this->updated_at)),
    ];
  }
}
