<?php

namespace App\Http\Requests;

class CustomerRequest extends ApiFormRequest{
  public function authorize(){
    return TRUE;
  }

  public function rules(){
    return [
      "name" => ["required", "string"],
      "surname" => ["required", "string"],
      "phone" => ["required", "string", "regex: (^994(50|51|55|70|77)[0-9]{3}[0-9]{2}[0-9]{2}$)", "unique:customers,phone"],
      "email" => ["nullable", "email", "unique:customers,email"],
      "gender" => ["required", "boolean"],
      "birthday" => ["required", "date"]
    ];
  }
}
