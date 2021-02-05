<?php

namespace App\Http\Resources\Device;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceMinimalResource extends JsonResource{
  /**
   * Transform the resource into an array.
   *
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var Device $this */
    return [
      "id" => $this->id,
      "name" => $this->name,
      "slug" => $this->slug
    ];
  }
}
