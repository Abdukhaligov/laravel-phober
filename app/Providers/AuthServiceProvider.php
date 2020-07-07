<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider {
  protected $policies = [
      Role::class => RolePolicy::class,
      User::class => UserPolicy::class
  ];

  public function boot() {
    $this->registerPolicies();

    Passport::routes();
  }
}
