<?php

use App\Models\Instance;
use Illuminate\Database\Seeder;

class InstanceSeeder extends Seeder {
  public function run() {
    $now = new DateTime();

    $instances = array(
        array('device_id' => 1,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 1,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 1,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 1,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 2,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 2,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 4,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 4,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 4,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 4,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 5,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 5,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 5,'updated_at' => $now,'created_at' => $now),
        array('device_id' => 5,'updated_at' => $now,'created_at' => $now),
    );

    DB::table("instances")->insert($instances);
  }
}
