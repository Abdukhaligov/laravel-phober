<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => [Rule::unique('users')->ignore($this->user()->id)],
        'company_id' => ['sometimes', 'exists:companies,id', 'nullable'],
        'position_id' => ['sometimes', 'exists:positions,id', 'nullable'],
    ];
  }

  public function messages() {
    return [
      //
    ];
  }

  protected function failedValidation(Validator $validator) {
    $errors = (new ValidationException($validator))->errors();
    throw new HttpResponseException(response()->json(['errors' => $errors
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
  }
}
