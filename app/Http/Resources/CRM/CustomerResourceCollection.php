<?php

namespace App\Http\Resources\CRM;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerResourceCollection extends ResourceCollection{
  /**
   * Transform the resource collection into an array.
   *
   * @param  Request  $request
   * @return AnonymousResourceCollection
   */
  public function toArray($request){
    return CustomerResource::collection($this->collection);
  }
}