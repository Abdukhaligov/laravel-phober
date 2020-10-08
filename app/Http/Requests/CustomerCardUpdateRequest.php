<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class CustomerCardUpdateRequest extends FormRequest{
  /**
   * Determine if the user is authorized to make this request.
   * @return bool
   */
  public function authorize(){
    return TRUE;
  }

  /**
   * Get the validation rules that apply to the request.
   * @return array
   */
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

  protected function failedValidation(Validator $validator){
    $errors = (new ValidationException($validator))->errors();
    throw new HttpResponseException(response()->json(["apiVersion" => config("api.version"), "errors" => $errors
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
  }
}
