<?php

namespace App\Http\Controllers\Api\V1\CRM;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Resources\CRM\CustomerResource;
use App\Http\Resources\CRM\CustomerResourceCollection;
use App\Models\Cards\LoyaltyCard;
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
   *   path="/crm/customers/findBy/id/{id}",
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

  /**
   * @OA\Get(
   *   path="/crm/customers/findBy/loyaltyCard/id/{id}",
   *   summary="Find Customer by loyalty cart id",
   *   operationId="customersfindByLoyaltyCardId",
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
  public function findByLoyaltyCardId($id){
    /** @var LoyaltyCard $loyaltyCard */
    $loyaltyCard = LoyaltyCard::find($id);

    if (!$loyaltyCard) return self::responseNotFound("Loyalty Card");

    $customer = new CustomerResource($loyaltyCard->owner);

    return self::responseSuccess($customer);
  }

  /**
   * @OA\Get(
   *   path="/crm/customers/findBy/loyaltyCard/number/{number}",
   *   summary="Find Customer by loyalty cart number",
   *   operationId="customersfindByLoyaltyCardNumber",
   *   tags={"CRM"},
   *   security={{"bearer_token": {}}},
   *   @OA\Parameter(
   *     name="number",
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
   * @param $number
   * @return JsonResponse
   */
  public function findByLoyaltyCardNumber($number){
    /** @var LoyaltyCard $loyaltyCard */
    $loyaltyCard = LoyaltyCard::where("number", $number)->first();

    if (!$loyaltyCard) return self::responseNotFound("Loyalty Card");

    $customer = new CustomerResource($loyaltyCard->owner);

    return self::responseSuccess($customer);
  }
}
