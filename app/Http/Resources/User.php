<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection;
use DateTime;

/**
 * @property int id
 * @property string username
 * @property string email
 * @property mixed full_name
 * @property Collection roles
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class User extends JsonResource{
  public function toArray($request){
    return [
      "id" => $this->id,
      "username" => $this->username,
      "full_name" => $this->full_name,
      "email" => $this->email,
      "created_at" => date('h:m:s d-M-Y', strtotime($this->created_at)),
      "updated_at" => date('h:m:s d-M-Y', strtotime($this->updated_at)),
    ];
  }
}
