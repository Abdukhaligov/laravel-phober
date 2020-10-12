<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Game as GameResource;
use App\Http\Resources\GameCollection;
use App\Models\Game;

class GameController extends ApiController{
  public function index(){
    return self::responseJson(new GameCollection(Game::all()));
  }

  public function store(){
    return FALSE;
  }

  public function show($id){
    $device = Game::find($id);

    return $device?
      self::responseJson(new GameResource($device)):
      self::notFound();
  }

  public function update(){
    return FALSE;
  }

  public function destroy(){
    return FALSE;
  }
}