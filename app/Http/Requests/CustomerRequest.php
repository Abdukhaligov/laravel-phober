<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CustomerRequest extends FormRequest{
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
      'name' => ['required', 'string'],
      'surname' => ['required', 'string'],
      'phone' => ['required', 'string', 'regex: (^994(50|51|55|70|77)[0-9]{3}[0-9]{2}[0-9]{2}$)', 'unique:customers,phone'],
      'email' => ['nullable', 'email', 'unique:customers,email'],
      'gender' => ['required', 'boolean'],
      'birthday' => ['required', 'date']
    ];
  }

  protected function failedValidation(Validator $validator){
    $errors = (new ValidationException($validator))->errors();
    throw new HttpResponseException(response()->json(['errors' => $errors
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
  }
}
