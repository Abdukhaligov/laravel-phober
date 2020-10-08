<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DeviceCollection extends ResourceCollection{
  public $collects = 'App\Http\Resources\Device';

  public function toArray($request){
    return $this->collection;
  }
}
