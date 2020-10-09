<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CustomerUpdateRequest extends ApiFormRequest{
  public function authorize(){
    return TRUE;
  }

  public function rules(){
    $id = substr(strrchr($this->url(), '/'), 1);
    return [
      'name' => ['sometimes', 'required', 'string'],
      'surname' => ['sometimes', 'required', 'string'],
      'phone' => ['sometimes', 'required', 'string', 'regex: (^994(50|51|55|70|77)[0-9]{3}[0-9]{2}[0-9]{2}$)',
        Rule::unique('customers', 'phone')->ignore($id)],
      'email' => ['nullable', 'email',
        Rule::unique('customers', 'email')->ignore($id)],
      'gender' => ['sometimes', 'required', 'boolean'],
      'birthday' => ['sometimes', 'required', 'date']
    ];
  }
}
