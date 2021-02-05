<?php

namespace App\Tools\NovaPermissionTool;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;

class AttachToRole extends Action {
  use InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Perform the action on the given models.
   *
   * @param  ActionFields  $fields
   * @param  Collection  $models
   * @return mixed|void
   */
  public function handle(ActionFields $fields, Collection $models) {
    $role = Role::getModel()->find($fields['role']);
    foreach ($models as $model) {
      $role->givePermissionTo($model);
    }
  }

  /**
   * Get the fields available on the action.
   *
   * @return array
   */
  public function fields() {
    $ifRoot = Auth::user()->isRoot();

    $roles =  Role::getModel();

    $roles = $ifRoot ?
      $roles
        ->all()
        ->pluck('name', 'id')
        ->toArray() :
      $roles
        ->whereNotIn('id', [1, 2])
        ->where('name', "not like", 'label%')
        ->get()
        ->pluck('name', 'id')
        ->toArray();

    return [
      Select::make('Role')
        ->options($roles)
        ->displayUsingLabels(),
    ];
  }
}
