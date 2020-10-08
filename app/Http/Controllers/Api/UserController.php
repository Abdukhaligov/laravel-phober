<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Role;

class UserController extends ApiController{
  public function index(){
    return self::responseJson(new UserCollection(User::all()));
  }

  public function store(Request $request){
    return FALSE;
  }

  public function show($id){
    $user = User::find($id);

    return $user?
      self::responseJson(new UserResource($user)):
      self::notFound();
  }

  public function update(Request $request, $id){
    return FALSE;
  }

  public function destroy($id){
    return FALSE;
  }

  public function details(){
    return self::responseJson(new UserResource(Auth::user()));
  }

  public function login(Request $request){
    $login = filter_var($request->login, FILTER_VALIDATE_EMAIL)? 'email': 'username';

    if(Auth::attempt([$login => $request->login, "password" => $request->password])){
      /** @var User $user */
      $user = Auth::user();
      $token = $user->createToken("api")->accessToken;

      return self::responseJson(["status" => "success", "token" => $token], JsonResponse::HTTP_OK);
    }else{
      return self::responseJson(["status" => "error", "message" => "Credential error"], JsonResponse::HTTP_BAD_REQUEST);
    }
  }

  public function profileUpdate(UserRequest $request){
    /** @var User $user */
    $user = Auth::user();

    if($request->id && $user->isAdmin()) $user = User::find($request->id);

    $user->updateLog(__FUNCTION__, $request, $user->toArray());

    $user->update($request->all());
    return self::responseJson(["status" => "success", "data" => new UserResource($user)], JsonResponse::HTTP_OK);
  }

  public function roleList(){
    return Role::all();
  }
}
