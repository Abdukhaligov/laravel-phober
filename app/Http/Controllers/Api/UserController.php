<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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
      return response()->json(["status" => "success", "token" => $token], JsonResponse::HTTP_ACCEPTED);
    } else {
      return response()->json(["status" => "error", "message" => "Credential error"], JsonResponse::HTTP_BAD_REQUEST);
    }
  }

  public function details() {
    $user = Auth::user();

    return response()->json($user, JsonResponse::HTTP_ACCEPTED);
  }

  public function edit(UserRequest $request) {
    $user = Auth::user();
    $user->update($request->all());
    return response()->json(["status" => "ok"], 200);
  }
}
