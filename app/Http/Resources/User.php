<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource {
  public function toArray($request) {
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
