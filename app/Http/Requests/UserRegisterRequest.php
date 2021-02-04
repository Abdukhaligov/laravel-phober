<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest{
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
      'username' => ['required', 'string', 'max:255', 'unique:users,username'],
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email'],
      //'phone' => ['nullable', 'string', 'unique:users,phone'],
      //'phone' => ['sometimes', 'string', 'regex: (^994(50|51|55|70|77)[0-9]{3}[0-9]{2}[0-9]{2}$)', 'unique:users,phone'],
      'password' => ['required', 'string', 'min:6', 'confirmed'],
    ];
  }
}
