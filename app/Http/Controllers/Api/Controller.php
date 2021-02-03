<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController{
  protected static function responseInvalidData($errors){
    return response()->json([
      "message" => "The given data was invalid.",
      "errors" => $errors
    ], 422);
  }

  protected static function responseNotFound($resource = ""){
    $message = $resource ? $resource." not Found" : "Not Found";

    return response()->json(["message" => $message], 404);
  }

  protected static function responseSuccess($response, bool $message = false){
    if($message) $response = ["message" => $response];

    return response()->json($response);
  }

  protected static function responseError($error){
    return response()->json(["message" => $error], 400);
  }
}