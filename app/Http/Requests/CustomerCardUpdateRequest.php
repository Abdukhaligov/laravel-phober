<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CustomerCardUpdateRequest extends ApiFormRequest{
  public function authorize(){
    return TRUE;
  }

  public function rules(){
    $id = substr(strrchr($this->url(), '/'), 1);

    return [
      "owner_id" => ['sometimes', 'integer', 'exists:customers,id',
        Rule::unique('customer_cards', 'owner_id')->ignore($id)
      ],
      "number" => ['sometimes', 'integer',
        Rule::unique('customer_cards', 'number')->ignore($id)
      ],
    ];
  }
}
