<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy {
  use HandlesAuthorization;

  public function viewAny() { return true; }

  public function view() { return true; }

  public function create(User $user) { return $user->isAdmin(); }

  public function update(User $user) { return $user->isAdmin(); }

  public function delete($user) { return $user->isAdmin(); }

  public function restore($user) { return $user->isAdmin(); }

  public function forceDelete(User $user) { return $user->isAdmin(); }
}