<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {
  public function run() {
    Role::create(array("name" => "admin"));
    Role::create(array("name" => "manager"));
    Role::create(array("name" => "cashier"));
    Role::create(array("name" => "member"));
  }
}
