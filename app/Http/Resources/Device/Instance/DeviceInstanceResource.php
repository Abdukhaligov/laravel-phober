<?php

namespace App\Http\Resources\Device\Instance;

use App\Http\Resources\Device\DeviceMinimalResource;
use App\Http\Resources\Device\DeviceResource;
use App\Models\Device;
use App\Models\DeviceInstance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceInstanceResource extends JsonResource{
  /**
   * Transform the resource into an array.
   *
   * @param  Request  $request
   * @return array
   */
  public function toArray($request){
    /** @var DeviceInstance $this */
    return[
      "id" => $this->id,
      "device" => new DeviceMinimalResource($this->device),
      "active" => $this->active,
      "isActiveNow" => $this->isActiveNow(),
      "deactivationStart" => $this->deactivation_start,
      "deactivationEnd" => $this->deactivation_end,
    ];
  }
}
