<?php

use App\Models\Device;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder {
  public function run() {
    Device::create(array("name" => "HTC Vive", "slug" => "htc-vive"));
    Device::create(array("name" => "Oculus Rift", "slug" => "oculus-rift"));
    Device::create(array("name" => "PlayStation VR", "slug" => "ps-vr"));
    Device::create(array("name" => "Omni Virtuix", "slug" => "omni-virtuix"));
    Device::create(array("name" => "3DOF", "slug" => "3-dof"));
  }
}