<?php

namespace App\Observers;

use App\Models\DeviceInstance;

class DeviceInstanceObserver{
  public function creating(DeviceInstance $deviceInstance){
    $deviceInstance->order = $deviceInstance->device->getNextOrderVal();
  }
}
