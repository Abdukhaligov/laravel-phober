<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
  /**
   * @OA\Post(
   *   path="/auth/login",
   *   summary="Sign in",
   *   operationId="authLogin",
   *   tags={"Auth"},
   *   security={},
   *   @OA\RequestBody(
   *     required=true,
   *     description="Pass user credentials",
   *     @OA\JsonContent(
   *       examples={
   *         "withEmail": @OA\Examples(summary="With email",
   *                                   value = {"email": "admin@site.com",
   *                                            "password": "123456"}),
   *         "withUsername": @OA\Examples(summary="With username",
   *                                  value = {"username": "admin",
   *                                            "password": "123456"}),
   *        }
   *      )
   *   ),
   *   @OA\Response(
   *   response=422,
   *   description="Wrong credentials response",
   *     @OA\JsonContent(
   *       @OA\Property(property="message", type="string", example="Credential error")
   *     )
   *   ),
   *   @OA\Response(
   *     response=401,
   *     description="Wrong login field response",
   *     @OA\JsonContent(
   *       @OA\Property(property="message", type="string", example="At least one field is required (Email or Username)")
   *     )
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Success login",
   *     @OA\JsonContent(
   *       @OA\Property(property="token", type="string", example="dN9dIyKgpGmNQX7jmKemo)")
   *     )
   *   )
   * )
   *
   * @param  UserLoginRequest  $request
   * @return JsonResponse
   */
  public function login(UserLoginRequest $request){
    if ($request->email || $request->username){
      $data = ['password' => $request->password];

      if ($request->email){
        $data['email'] = $request->email;
      }
      elseif ($request->username){
        $data['username'] = $request->username;
      }

      if (Auth::attempt($data)){
        /** @var User $user */
        $user = Auth::user();
        $token = $user->createToken('phober-api')->accessToken;
        $response = (new UserResource($user))->resolve();
        $response["token"] = $token;

        return response()->json($response, JsonResponse::HTTP_OK);
      }
      else{
        return response()->json([
          'message' => 'Credential error',
          'errors' => ['password' => ['Password is incorrect']]
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
      }
    }

    return response()->json([
      'message' => 'At least one field is required (Email or Username)'
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
  }

  /**
   * @OA\Post(
   *   path="/auth/register",
   *   summary="Sign up",
   *   operationId="authRegister",
   *   tags={"Auth"},
   *   security={},
   *   @OA\RequestBody(
   *     required=true,
   *     @OA\JsonContent(
   *       examples={
   *         "simple":    @OA\Examples(summary="Simple",
   *                                   value = {"username": "username",
   *                                            "first_name": "First Name",
   *                                            "last_name": "Last Name",
   *                                            "password": "123456",
   *                                            "password_confirmation": "123456"}),
   *         "withEmail": @OA\Examples(summary="With email",
   *                                   value = {"username": "username",
   *                                            "first_name": "First Name",
   *                                            "last_name": "Last Name",
   *                                            "email": "test@dev.az",
   *                                            "password": "123456",
   *                                            "password_confirmation": "123456"}),
   *        }
   *      )
   *   ),
   *   @OA\Response(
   *   response=422,
   *   description="Unprocessable Entity",
   *     @OA\JsonContent(
   *       @OA\Property(property="message", type="string", example="The given data was invalid."),
   *       @OA\Property(property="errors", type="string", example="{}")
   *     )
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Success registration",
   *     @OA\JsonContent(
   *       @OA\Property(property="uuid", type="string", example="1234567"),
   *       @OA\Property(property="token", type="string", example="dN9dIyKgpGmNQX7jmKemo)")
   *     )
   *   )
   * )
   * @param  UserRegisterRequest  $request
   * @return JsonResponse
   */
  public function register(UserRegisterRequest $request){
    /** @var User $user */
    $user = User::create([
      'username' => $request->username,
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'phone' => $request->phone,
      'password' => bcrypt($request->password)
    ]);

    $token = $user->createToken('phober-api')->accessToken;

    return response()->json(['token' => $token], JsonResponse::HTTP_OK);
  }

  /**
   * @OA\Get(
   *   path="/auth/user",
   *   summary="Get Auth info",
   *   operationId="authUser",
   *   tags={"Auth"},
   *   security={{"bearer_token": {}}},
   *   @OA\Response(
   *     response=200,
   *     description="Success registration",
   *     @OA\JsonContent(
   *       @OA\Property(property="uuid", type="string", example="1234567"),
   *       @OA\Property(property="token", type="string", example="dN9dIyKgpGmNQX7jmKemo)")
   *     )
   *   )
   * )
   * @param  Request  $request
   * @return mixed
   */
  public function user(Request $request){
    return $request->user();
  }
}
