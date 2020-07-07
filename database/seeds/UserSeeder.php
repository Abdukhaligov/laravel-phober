<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
  public function run() {
    User::create(array("name" => "admin", "email" => "admin@site.com", "password" => bcrypt(123456)));
  }
}
