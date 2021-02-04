<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\GameResource;
use App\Http\Resources\GameResourceCollection;
use App\Models\Game;
use Illuminate\Http\JsonResponse;

class GameController extends Controller{
  /**
   * @OA\Get(
   *   path="/games",
   *   summary="Get all games",
   *   operationId="gamessIndex",
   *   tags={"Games"},
   *   security={},
   *   @OA\Response(
   *     response="200",
   *     description="ok",
   *   )
   * )
   *
   * @return GameResourceCollection
   */
  public function index(){
    return new GameResourceCollection(Game::all());
  }

  /**
   * @OA\Get(
   *   path="/games/{id}",
   *   summary="Get game by id",
   *   operationId="gamesShow",
   *   tags={"Games"},
   *   security={},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=false,
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
    $device = Game::find($id);

    return $device
      ? self::responseSuccess(new GameResource($device))
      : self::responseNotFound('Game');
  }
}
