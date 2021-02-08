<?php

namespace Database\Seeders;

use App\Models\DeviceInstance;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceInstanceSeeder extends Seeder{
  public function run(){
    DeviceInstance::create(['device_id' => 1]);
    DeviceInstance::create(['device_id' => 1]);
    DeviceInstance::create(['device_id' => 1]);
    DeviceInstance::create(['device_id' => 1]);
    DeviceInstance::create(['device_id' => 2]);
    DeviceInstance::create(['device_id' => 2]);
    DeviceInstance::create(['device_id' => 4]);
    DeviceInstance::create(['device_id' => 4]);
    DeviceInstance::create(['device_id' => 4]);
    DeviceInstance::create(['device_id' => 4]);
    DeviceInstance::create(['device_id' => 5]);
    DeviceInstance::create(['device_id' => 5]);
    DeviceInstance::create(['device_id' => 5]);
    DeviceInstance::create(['device_id' => 5]);
  }
}
