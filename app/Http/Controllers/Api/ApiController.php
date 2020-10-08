<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller{
  protected static final function notFound(){
    $data["apiVersion"] = config("api.version");
    $data["message"] = "Customer card not found";
    return response()->json($data, JsonResponse::HTTP_NOT_FOUND);
  }

  protected static final function responseJson($array, $status = NULL){
    if($status){
      $data["apiVersion"] = config("api.version");

      foreach($array as $key => $item){
        $data[$key] = $item;
      }
      return response()->json($data, $status);
    }

    return [
      "apiVersion" => config("api.version"),
      "data" => $array
    ];
  }
}
