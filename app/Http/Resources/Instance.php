<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Instance extends JsonResource {
  public function toArray($request) {
    $comments = [];

    foreach ($this->comments as $comment) {
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
        "deactivation_start" => $this->deactivation_start,
        "deactivation_end" => $this->deactivation_end,
        "status" => $this->status(),
        "comments" => $comments
    ];
  }
}
