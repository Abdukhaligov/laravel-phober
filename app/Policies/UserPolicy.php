<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Request;

class UserPolicy {
  use HandlesAuthorization;

  public function viewAny() { return true; }

  public function view() { return true; }

  public function create() { return true; }

  public function update(User $currentUser, User $user) {
    if ($user->id == 1 && $currentUser->id != 1) return false;
    return true;
  }

  public function delete(User $currentUser, User $user) {
    if ($user->id == 1 && $currentUser->id != 1) return false;
    return true;
  }

  public function restore(User $currentUser, User $user) {
    if ($user->id == 1 && $currentUser->id != 1) return false;
    return true;
  }

  public function forceDelete(User $currentUser, User $user) {
    if ($user->id == 1 && $currentUser->id != 1) return false;
    return true;
  }

  public function attachRole(User $currentUser, User $user, Role $role) {
    if ($currentUser->id == 1) return true;
    if ($currentUser->id != 1 && $user->id == 1) return false;
    if ($role->id == 1) return false;
    return true;
  }

  public function detachRole(User $currentUser, User $user, Role $role) {
    if ($currentUser->id == 1) return true;
    if ($currentUser->id != 1 && $user->id == 1) return false;
    if ($role->id == 1) return false;
    return true;
  }
}