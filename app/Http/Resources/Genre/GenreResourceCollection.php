<?php

namespace App\Http\Resources\Genre;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GenreResourceCollection extends ResourceCollection{
  /**
   * Transform the resource collection into an array.
   *
   * @param  Request  $request
   * @return AnonymousResourceCollection
   */
  public function toArray($request){
    return GenreResource::collection($this->collection);
  }
}
