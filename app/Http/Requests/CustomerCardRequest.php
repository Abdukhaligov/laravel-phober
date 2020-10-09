<?php

namespace App\Http\Requests;

class CustomerCardRequest extends ApiFormRequest{
  public function authorize(){
    return TRUE;
  }

  public function rules(){
    return [
      "owner_id" => ['required', 'integer', 'exists:customers,id', 'unique:customer_cards,owner_id'],
      "number" => ['required', 'integer', 'unique:customer_cards,number'],
    ];
  }
}
