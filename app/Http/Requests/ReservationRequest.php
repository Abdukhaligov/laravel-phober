<?php

namespace App\Http\Requests;

class ReservationRequest extends ApiFormRequest{
  public function authorize(){
    return TRUE;
  }

  public function rules(){
    return [
      "full_name" => ["required", "string"],
      "phone" => ["required", "string", "regex: (^994(50|51|55|70|77)[0-9]{3}[0-9]{2}[0-9]{2}$)"],
      "date" => ["required", "date"],
      "player_count" => ["required", "integer"],
      "years_old" => ["required", "integer"],
      "type" => ["required", "string"],
      "note" => ["string"],
    ];
  }
}
