<?php

namespace App\Http\Resources\CRM;

use App\Models\Cards\LoyaltyCard;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoyaltyCardResource extends JsonResource{
  /**
   * Transform the resource into an array.
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    $comments = [];

    /** @var LoyaltyCard $this */
    foreach ($this->comments as $comment){
      $comments = array(
        "comment" => $comment->comment,
        "author" => $comment->commenter->username,
        "authorEmail" => $comment->commenter->email,
        "date" => $comment->created_at
      );
    }

    /** @var LoyaltyCard $this */
    return[
      "id" => $this->id,
      "number" => $this->number,
      "owner" => new CustomerResource($this->owner),
      "comments" => $comments
    ];
  }
}
