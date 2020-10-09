<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReservationCollection extends ResourceCollection{
  public $collects = 'App\Http\Resources\Reservation';

  public function toArray($request){
    return $this->collection;
  }
}
