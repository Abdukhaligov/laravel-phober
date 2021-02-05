<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder{
  public function run(){
    User::create([
      "username" => "admin",
      "first_name" => "Hikmat",
      "last_name" => "Abdukhaligov",
      "email" => "admin@site.com",
      "password" => bcrypt(123456)
    ]);
    User::create([
      "username" => "manager",
      "email" => "manager@site.com",
      "password" => bcrypt(123456)
    ]);
    User::create([
      "username" => "cashier",
      "email" => "cashier@site.com",
      "password" => bcrypt(123456)
    ]);
    User::create([
      "username" => "member",
      "email" => "member@site.com",
      "password" => bcrypt(123456)
    ]);
  }
}
