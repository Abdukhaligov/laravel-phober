<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationUpdateRequest extends FormRequest{
  public function authorize(){
    return TRUE;
  }

  public function rules(){
    return [
      "full_name" => ["sometimes", "string"],
      "phone" => ["sometimes", "string", "regex: (^994(50|51|55|70|77)[0-9]{3}[0-9]{2}[0-9]{2}$)"],
      "date" => ["sometimes", "date"],
      "player_count" => ["sometimes", "integer"],
      "years_old" => ["sometimes", "integer"],
      "type" => ["sometimes", "string"],
      "note" => ["string"],
    ];
  }
}
