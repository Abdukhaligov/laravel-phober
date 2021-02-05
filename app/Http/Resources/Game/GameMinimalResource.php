<?php

namespace App\Http\Resources\Game;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameMinimalResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var Game $this */
    return [
      "id" => $this->id,
      "name" => $this->name,
      "slug" => $this->slug,
      "video" => "https://www.youtube.com/watch?v=".$this->video,
      "preview" => $this->getFirstMediaUrl('preview'),
      "rating" => $this->rating,
      "multiplayer" => $this->multiplayer,
    ];
  }
}