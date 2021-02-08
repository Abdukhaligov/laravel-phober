<?php

namespace App\Http\Controllers\Api\V1\CRM;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Resources\CRM\ReservationResource;
use App\Http\Resources\CRM\ReservationResourceCollection;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;

class ReservationController extends Controller{
  /**
   * @OA\Get(
   *   path="/crm/reservations",
   *   summary="Get all reservations",
   *   operationId="reservationsIndex",
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
    $devices = (new ReservationResourceCollection(Reservation::all()))->resolve();

    return self::responseSuccess($devices);
  }

  /**
   * @OA\Get(
   *   path="/crm/reservations/findById/{id}",
   *   summary="Get reservation by id",
   *   operationId="reservationsShow",
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
    $reservation = Reservation::find($id);

    return $reservation
      ? self::responseSuccess(new ReservationResource($reservation))
      : self::responseNotFound('Reservation');
  }
}
