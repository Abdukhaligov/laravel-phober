<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleAndPermissionSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    /** @var Role $adminRole */
    Role::create(['name' => 'root']);
    $adminRole = Role::create(['name' => 'admin']);
    Role::create(array("name" => "manager"));
    Role::create(array("name" => "cashier"));
    Role::create(array("name" => "member"));

    $dashboard = Permission::create(['name' => 'view dashboard']);
    $nova = Permission::create(['name' => 'view nova']);
    $telescope = Permission::create(['name' => 'view telescope']);
    $swagger = Permission::create(['name' => 'view swagger']);

    $adminRole->givePermissionTo($dashboard, $nova, $telescope, $swagger);

    /** @var User $rootUser */
    if ($rootUser = User::find(1)) $rootUser->assignRole('root');
  }
}
