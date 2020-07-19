<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection {
  public $collects = 'App\Http\Resources\Customer';

  public function toArray($request) {
    return [
        'data' => $this->collection,
    ];
  }
}
