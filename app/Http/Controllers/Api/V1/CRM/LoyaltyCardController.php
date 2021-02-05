<?php

namespace App\Http\Controllers\Api\V1\CRM;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Resources\CRM\LoyaltyCardMinimalResourceCollection;
use App\Http\Resources\CRM\LoyaltyCardResource;
use App\Models\Cards\LoyaltyCard;
use Illuminate\Http\JsonResponse;

class LoyaltyCardController extends Controller{
  /**
   * @OA\Get(
   *   path="/crm/loyalty-cards",
   *   summary="Get all loyalty cards",
   *   operationId="loyaltyCardsIndex",
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
    $games = (new LoyaltyCardMinimalResourceCollection(LoyaltyCard::all()))->resolve();

    return self::responseSuccess($games);
  }

  /**
   * @OA\Get(
   *   path="/crm/loyalty-cards/findBy/id/{id}",
   *   summary="Get loyalty card by id",
   *   operationId="loyaltyCardsShow",
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
    $loyaltyCard = LoyaltyCard::find($id);

    return $loyaltyCard
      ? self::responseSuccess(new LoyaltyCardResource($loyaltyCard))
      : self::responseNotFound('Game');
  }
}
