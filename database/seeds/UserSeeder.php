<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
  public function run() {
    User::create(array("name" => "admin", "email" => "admin@site.com", "password" => bcrypt(123456)));
    User::create(array("name" => "manager", "email" => "manager@site.com", "password" => bcrypt(123456)));
    User::create(array("name" => "cashier", "email" => "cashier@site.com", "password" => bcrypt(123456)));
    User::create(array("name" => "member", "email" => "member@site.com", "password" => bcrypt(123456)));
  }
}
