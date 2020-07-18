<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Logs;
use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
  public function login(Request $request) {
    $login = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    if (Auth::attempt([$login => $request->login, "password" => $request->password])) {
      $user = Auth::user();
      $token = $user->createToken("api")->accessToken;

      $user->logs()->create(["body" => "Successfully login", "ip" => $request->ip()]);

      return response()->json(["status" => "success", "token" => $token], JsonResponse::HTTP_OK);
    } else {

      Logs::create([
          "body" => "Fail login, request: ". json_encode($request->all()),
          "ip" => $request->ip()
      ]);

      return response()->json(["status" => "error", "message" => "Credential error"], JsonResponse::HTTP_OK);
    }
  }

  public function details() {
    return response()->json(Auth::user(), JsonResponse::HTTP_OK);
  }

  public function update(UserRequest $request) {
    $user = Auth::user();
    $user->update($request->all());
    return response()->json(["status" => "success"], JsonResponse::HTTP_OK);
  }

  public function list(){
    return User::all();
  }
}
