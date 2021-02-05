<?php

namespace App\Http\Resources\Game;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GameMinimalResourceCollection extends ResourceCollection{
  /**
   * Transform the resource collection into an array.
   *
   * @param  Request  $request
   * @return AnonymousResourceCollection
   */
  public function toArray($request){
    return GameMinimalResource::collection($this->collection);
  }
}
