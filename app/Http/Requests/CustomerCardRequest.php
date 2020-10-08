<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CustomerCardRequest extends FormRequest{
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
    return [
      "owner_id" => ['required', 'integer', 'exists:customers,id', 'unique:customer_cards,owner_id'],
      "number" => ['required', 'integer', 'unique:customer_cards,number'],
    ];
  }

  protected function failedValidation(Validator $validator){
    $errors = (new ValidationException($validator))->errors();
    throw new HttpResponseException(response()->json(['errors' => $errors
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
  }
}
