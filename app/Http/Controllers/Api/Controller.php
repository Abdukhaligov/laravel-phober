<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController{
  protected static function responseInvalidData($errors){
    return response()->json([
      "message" => "The given data was invalid.",
      "errors" => $errors
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
  }

  protected static function responseNotFound($resource = ""){
    $message = $resource ? $resource." not Found" : "Not Found";

    return response()->json(["message" => $message], JsonResponse::HTTP_NOT_FOUND);
  }

  protected static function responseSuccess($response, bool $message = false){
    if($message) $response = ["message" => $response];

    return response()->json($response, JsonResponse::HTTP_OK);
  }

  protected static function responseError($error){
    return response()->json(["message" => $error], JsonResponse::HTTP_BAD_REQUEST);
  }
}