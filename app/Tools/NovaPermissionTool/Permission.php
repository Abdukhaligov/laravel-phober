<?php

namespace App\Tools\NovaPermissionTool;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Nova;
use Laravel\Nova\Resource;
use Spatie\Permission\PermissionRegistrar;

class Permission extends Resource {
  public static $model = \App\Models\Permission::class;
  public static $title = 'name';
  public static $search = ['name'];

  public static function getModel() {
    return app(\App\Models\Permission::class);
  }

  /**
   * Get the logical group associated with the resource.
   *
   * @return string
   */
  public static function group() {
    return __('navigation.sidebar-label');
  }

  /**
   * Determine if this resource is available for navigation.
   *
   * @param  Request  $request
   * @return bool
   */
  public static function availableForNavigation(Request $request) {
    //return true;
    return Gate::allows('viewAny',
      app(PermissionRegistrar::class)->getPermissionClass());
  }

  public static function label() {
    return __('resources.Permissions');
  }

  public static function singularLabel() {
    return __('resources.Permission');
  }

  /**
   * Get the fields displayed by the resource.
   *
   * @param  Request  $request
   * @return array
   */
  public function fields(Request $request) {
    $guardOptions = collect(config('auth.guards'))->mapWithKeys(function (
      $value,
      $key
    ) {
      return [$key => $key];
    });

    $userResource = Nova::resourceForModel(getModelForGuard($this->guard_name));

    return [
      ID::make()->sortable(),

      Text::make(__('permissions.name'), 'name')
        ->rules(['required', 'string', 'max:255'])
        ->creationRules('unique:'.config('permission.table_names.permissions'))
        ->updateRules('unique:'.config('permission.table_names.permissions').',name,{{resourceId}}'),

      Text::make(__('permissions.display_name'), function () {
        return __('permissions.display_names.'.$this->name);
      })->canSee(function () {
        return is_array(__('permissions.display_names'));
      }),

      Select::make(__('permissions.guard_name'), 'guard_name')
        ->options($guardOptions->toArray())
        ->rules(['required', Rule::in($guardOptions)]),

      DateTime::make(__('permissions.created_at'),
        'created_at')->exceptOnForms(),
      DateTime::make(__('permissions.updated_at'),
        'updated_at')->exceptOnForms(),

      RoleBooleanGroup::make(__('permissions.roles'), 'roles'),

      MorphToMany::make($userResource::label(), 'users', $userResource)
        ->searchable()
        ->singularLabel($userResource::singularLabel()),
    ];
  }

  /**
   * Get the actions available for the resource.
   *
   * @param  Request  $request
   * @return array
   */
  public function actions(Request $request) {
    return [
      new AttachToRole,
    ];
  }
}
