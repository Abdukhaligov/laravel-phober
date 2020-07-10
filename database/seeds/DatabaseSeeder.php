<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  public function run() {
    $this->call(UserSeeder::class);
    $this->call(RoleSeeder::class);
    $this->call(UserRoleSeeder::class);

    $this->call(GameSeeder::class);
    $this->call(GenreSeeder::class);
    $this->call(GameGenreSeeder::class);
    $this->call(DeviceSeeder::class);
    $this->call(GameDeviceSeeder::class);

    $this->call(MediaSeeder::class);
  }
}