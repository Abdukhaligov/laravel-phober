<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection;
use DateTime;

/**
 * @property int id
 * @property string name
 * @property string slug
 * @property string description
 * @property Collection games
 * @property array comments
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Device extends JsonResource{
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
      "description" => $this->description,
      "comments" => $comments
    ];
  }
}
