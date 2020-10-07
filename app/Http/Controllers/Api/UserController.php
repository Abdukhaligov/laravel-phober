<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Role;
use function Webmozart\Assert\Tests\StaticAnalysis\false;

class UserController extends Controller{
  public function index(){
    return new UserCollection(User::all());
  }

  public function store(Request $request){
    return false;
  }

  public function show($id){
    return new UserResource(User::find($id));
  }

  public function update(Request $request, $id){
    return false;
  }

  public function destroy($id){
    return false;
  }

  public function details(){
    return new UserResource(Auth::user());
  }

  public function login(Request $request){
    $login = filter_var($request->login, FILTER_VALIDATE_EMAIL)? 'email': 'username';

    if(Auth::attempt([$login => $request->login, "password" => $request->password])){
      /** @var User $user */
      $user = Auth::user();
      $token = $user->createToken("api")->accessToken;

      return response()->json(["status" => "success", "token" => $token], JsonResponse::HTTP_OK);
    }else{
      return response()->json(["status" => "error", "message" => "Credential error"], JsonResponse::HTTP_OK);
    }
  }

  public function profileUpdate(UserRequest $request){
    /** @var User $user */
    $user = Auth::user();

    if($request->id && $user->isAdmin()) $user = User::find($request->id);

    $user->updateLog(__FUNCTION__, $request, $user->toArray());

    $user->update($request->all());
    return response()->json(["status" => "success", "data" => new UserResource($user)], JsonResponse::HTTP_OK);
  }

  public function roleList(){
    return Role::all();
  }
}
