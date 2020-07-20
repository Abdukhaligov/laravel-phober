<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Logs;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
  public function index() {
    return new UserCollection(User::all());
  }

  public function show($id){
    return new UserResource(User::find($id));
  }

  public function details() {
    return new UserResource(Auth::user());
  }

  public function login(Request $request) {
    $login = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    $logs = [
        "action" => __FUNCTION__,
        "ip" => $request->ip(),
        "url" => $request->url()
    ];

    if (Auth::attempt([$login => $request->login, "password" => $request->password])) {
      $user = Auth::user();
      $token = $user->createToken("api")->accessToken;

      $logs["body"] = json_encode(["status" => "Success"]);

      $user->logs()->create($logs);

      return response()->json(["status" => "success", "token" => $token], JsonResponse::HTTP_OK);
    } else {
      $logs["body"] = json_encode(["status" => "Failed", "request" => $request->all()]);

      Logs::create($logs);

      return response()->json(["status" => "error", "message" => "Credential error"], JsonResponse::HTTP_OK);
    }
  }

  public function update(UserRequest $request) {
    $user = Auth::user();

    if ($request->id && $user->isAdmin()) $user = User::find($request->id);

    $logs = [
        "action" => __FUNCTION__,
        "ip" => $request->ip(),
        "url" => $request->url(),
        "author_id" => $user->id,
        "body" => json_encode([
            "status" => "Success",
            "request" => $request->all(),
            "old" => array(
                "email" => $user->email,
                "full_name" => $user->full_name
            ),
        ]),
    ];

    $user->logs()->create($logs);

    $user->update($request->all());
    return response()->json(["status" => "success", "data" => new UserResource($user)], JsonResponse::HTTP_OK);
  }
}
