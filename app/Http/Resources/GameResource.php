<?php

namespace App\Http\Resources;

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
        "author_email" => $comment->commenter->email,
        "date" => date('h:m:s d-m-Y', strtotime($comment->created_at))
      );
    }

    return [
      "id" => $this->id,
      "name" => $this->name,
      "slug" => $this->slug,
      "video" => "https://www.youtube.com/watch?v=".$this->video,
      "image" => $this->getFirstMediaUrl('game'),
      "rating" => $this->rating,
      "multiplayer" => $this->multiplayer,
      "devices" => new DeviceMinimalResourceCollection($this->devices),
      "description" => $this->getTranslations('description'),
      "comments" => $comments
    ];
  }
}
