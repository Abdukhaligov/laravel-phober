<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Device;
use DateTime;

/**
 * @property integer id
 * @property bool active
 * @property array comments
 * @property Device device
 * @property DateTime deactivation_start
 * @property DateTime deactivation_end
 * @method static find($id)
 * @method isActiveNow() //Model Instance method
 */
class Instance extends JsonResource{
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
      "device" => $this->device,
      "active" => $this->active,
      "isActiveNow" => $this->isActiveNow(),
      "deactivation_start" => $this->deactivation_start,
      "deactivation_end" => $this->deactivation_end,
      "comments" => $comments
    ];
  }
}
