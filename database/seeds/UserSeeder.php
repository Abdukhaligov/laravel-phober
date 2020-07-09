<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
  public function run() {
    User::create(array("username" => "admin", "email" => "admin@site.com", "password" => bcrypt(123456)));
    User::create(array("username" => "manager", "email" => "manager@site.com", "password" => bcrypt(123456)));
    User::create(array("username" => "cashier", "email" => "cashier@site.com", "password" => bcrypt(123456)));
    User::create(array("username" => "member", "email" => "member@site.com", "password" => bcrypt(123456)));
  }
}
