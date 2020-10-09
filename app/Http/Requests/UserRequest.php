<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UserRequest extends ApiFormRequest{
  public function authorize(){
    return TRUE;
  }

  public function rules(){
    return [
      'email' => [Rule::unique('users')->ignore($this->user()->id)],
    ];
  }
}
