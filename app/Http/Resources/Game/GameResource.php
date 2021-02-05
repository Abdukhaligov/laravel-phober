<?php

namespace App\Http\Resources\Game;

use App\Http\Resources\Device\DeviceMinimalResourceCollection;
use App\Http\Resources\Genre\GenreResourceCollection;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    $comments = [];

    /** @var Game $this */
    foreach ($this->comments as $comment){
      $comments = array(
        "comment" => $comment->comment,
        "author" => $comment->commenter->username,
        "authorEmail" => $comment->commenter->email,
        "date" => $comment->created_at
      );
    }

    return [
      "id" => $this->id,
      "name" => $this->name,
      "slug" => $this->slug,
      "video" => "https://www.youtube.com/watch?v=".$this->video,
      "preview" => $this->getFirstMediaUrl('preview'),
      "rating" => $this->rating,
      "multiplayer" => $this->multiplayer,
      "devices" => new DeviceMinimalResourceCollection($this->devices),
      "genres" => new GenreResourceCollection($this->genres),
      "description" => $this->getTranslations('description'),
      "comments" => $comments
    ];
  }
}
