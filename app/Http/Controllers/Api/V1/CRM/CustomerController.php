<?php

namespace App\Http\Controllers\Api\V1\CRM;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Resources\CRM\CustomerResource;
use App\Http\Resources\CRM\CustomerResourceCollection;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller{
  /**
   * @OA\Get(
   *   path="/crm/customers",
   *   summary="Get all customers",
   *   operationId="customersIndex",
   *   tags={"CRM"},
   *   security={{"bearer_token": {}}},
   *   @OA\Response(
   *     response="200",
   *     description="ok",
   *   )
   * )
   *
   * @return JsonResponse
   */
  public function index(){
    $games = (new CustomerResourceCollection(Customer::all()))->resolve();

    return self::responseSuccess($games);
  }

  /**
   * @OA\Get(
   *   path="/crm/customers/findById/{id}",
   *   summary="Get customer by id",
   *   operationId="customersShow",
   *   tags={"CRM"},
   *   security={{"bearer_token": {}}},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response="200",
   *     description="ok",
   *   )
   * )
   *
   * @param $id
   * @return JsonResponse
   */
  public function show($id){
    $device = Customer::find($id);

    return $device
      ? self::responseSuccess(new CustomerResource($device))
      : self::responseNotFound('Game');
  }
}
