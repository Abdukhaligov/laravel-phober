<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCardCollection extends ResourceCollection{
  public $collects = 'App\Http\Resources\CustomerCard';

  public function toArray($request){
    return [
      'data' => $this->collection,
    ];
  }
}
