<?php

namespace App\Http\Resources\Genre;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var Genre $this */
    return[
      "id" => $this->id,
      "name" => $this->name
    ];
  }
}
