<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder {
  public function run() {
    $data = [
        ["user_id" => 1, "role_id" => 1], ["user_id" => 1, "role_id" => 2], ["user_id" => 1, "role_id" => 3], ["user_id" => 1, "role_id" => 4],
        ["user_id" => 2, "role_id" => 2], ["user_id" => 2, "role_id" => 3], ["user_id" => 2, "role_id" => 4],
        ["user_id" => 3, "role_id" => 3], ["user_id" => 3, "role_id" => 4],
        ["user_id" => 4, "role_id" => 4],
    ];

    DB::table('user_role')->insert($data);
  }
}
