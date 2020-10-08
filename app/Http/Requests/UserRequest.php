<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest{
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
      'email' => [Rule::unique('users')->ignore($this->user()->id)],
    ];
  }

  protected function failedValidation(Validator $validator){
    $errors = (new ValidationException($validator))->errors();
    throw new HttpResponseException(response()->json(["apiVersion" => config("api.version"), "errors" => $errors
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
  }
}
