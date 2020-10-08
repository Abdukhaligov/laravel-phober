<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GameCollection extends ResourceCollection{
  public $collects = 'App\Http\Resources\Game';

  public function toArray($request){
    return $this->collection;
  }
}
