<?php

namespace App\Http\Resources\Device;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DeviceMinimalResourceCollection extends ResourceCollection{
  /**
   * Transform the resource collection into an array.
   *
   * @param  Request  $request
   * @return AnonymousResourceCollection
   */
  public function toArray($request){
    return DeviceMinimalResource::collection($this->collection);
  }
}
