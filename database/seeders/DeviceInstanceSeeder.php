<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceInstanceSeeder extends Seeder{
  public function run(){
    $now = new DateTime();

    $instances = [
      ['device_id' => 1, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 1, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 1, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 1, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 2, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 2, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 4, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 4, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 4, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 4, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 5, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 5, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 5, 'updated_at' => $now, 'created_at' => $now],
      ['device_id' => 5, 'updated_at' => $now, 'created_at' => $now],
    ];

    DB::table("device_instances")->insert($instances);
  }
}
