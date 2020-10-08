<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property int id
 * @property string name
 * @property string slug
 * @property int rating
 * @property bool multiplayer
 * @property string video
 * @property string description
 * @property Collection games
 * @property Collection devices
 * @property array comments
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method getTranslations(string $string)
 * @method getFirstMediaUrl(string $collectionName)
 */
class Game extends JsonResource{
  public function toArray($request){
    $comments = [];

    foreach($this->comments as $comment){
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
      "devices" => $this->devices,
      "description" => $this->getTranslations('description'),
      "comments" => $comments
    ];
  }
}
