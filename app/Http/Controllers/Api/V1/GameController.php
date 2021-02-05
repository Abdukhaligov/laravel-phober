<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Game\GameMinimalResourceCollection;
use App\Http\Resources\Game\GameResource;
use App\Models\Device;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;

class GameController extends Controller{
  /**
   * @OA\Get(
   *   path="/games",
   *   summary="Get all games",
   *   operationId="gamesIndex",
   *   tags={"Games"},
   *   security={},
   *   @OA\Response(
   *     response="200",
   *     description="ok",
   *   )
   * )
   *
   * @return JsonResponse
   */
  public function index(){
    $games = (new GameMinimalResourceCollection(Game::all()))->resolve();

    return self::responseSuccess($games);
  }

  /**
   * @OA\Get(
   *   path="/games/findBy/id/{id}",
   *   summary="Get game by id",
   *   operationId="gamesShow",
   *   tags={"Games"},
   *   security={},
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
    $device = Game::find($id);

    return $device
      ? self::responseSuccess(new GameResource($device))
      : self::responseNotFound('Game');
  }

  /**
   * @OA\Get(
   *   path="/games/findBy/genre/id/{id}",
   *   summary="Find games by genre id",
   *   operationId="gamesFindByGenre",
   *   tags={"Games"},
   *   security={},
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
  public function findByGenre($id){
    /** @var Genre $genre */
    $genre = Genre::find($id);

    if (!$genre) return self::responseNotFound("Genre");

    $games = (new GameMinimalResourceCollection($genre->games))->resolve();

    return self::responseSuccess($games);
  }

  /**
   * @OA\Get(
   *   path="/games/findBy/device/id/{id}",
   *   summary="Find games by device id",
   *   operationId="gamesFindByDevice",
   *   tags={"Games"},
   *   security={},
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
  public function findByDevice($id){
    /** @var Device $genre */
    $genre = Device::find($id);

    if (!$genre) return self::responseNotFound("Device");

    $games = (new GameMinimalResourceCollection($genre->games))->resolve();

    return self::responseSuccess($games);
  }

  /**
   * @OA\Get(
   *   path="/games/findBy/rating/{value}",
   *   summary="Find games by rating",
   *   operationId="gamesFindByRating",
   *   tags={"Games"},
   *   security={},
   *   @OA\Parameter(
   *     name="value",
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
   * @param $value
   * @return JsonResponse
   */
  public function findByRating($value){
    $games = (new GameMinimalResourceCollection(Game::where("rating", $value)->get()))->resolve();

    return self::responseSuccess($games);
  }
}
