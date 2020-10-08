<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BarCollection extends ResourceCollection{
  public $collects = 'App\Http\Resources\Bar';

  public function toArray($request){
    return $this->collection;
  }
}
