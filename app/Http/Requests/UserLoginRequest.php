<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(){
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(){
    return [
      'username' => ['sometimes', 'string', 'size:7', 'exists:users'],
      'email' => ['sometimes', 'string', 'max:255', 'exists:users'],
      'password' => ['required', 'string'],
    ];
  }
}
