<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InstanceCollection extends ResourceCollection{
  public $collects = 'App\Http\Resources\Instance';

  public function toArray($request){
    return $this->collection;
  }
}
