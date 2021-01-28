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

class Role extends Resource {

  public static $model = \App\Models\Role::class;
  public static $title = 'name';
  public static $search = [
    'name',
  ];

  public static function getModel() {
    return app(\App\Models\Role::class);
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
    return true;
    return Gate::allows('viewAny',
      app(PermissionRegistrar::class)->getRoleClass());
  }

  public static function label() {
    return __('resources.Roles');
  }

  public static function singularLabel() {
    return __('resources.Role');
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

      Text::make(__('roles.name'), 'name')
        ->rules(['required', 'string', 'max:255'])
        ->creationRules('unique:'.config('permission.table_names.roles'))
        ->updateRules('unique:'.config('permission.table_names.roles').',name,{{resourceId}}'),

      Select::make(__('roles.guard_name'), 'guard_name')
        ->options($guardOptions->toArray())
        ->rules(['required', Rule::in($guardOptions)]),

      DateTime::make(__('roles.created_at'),
        'created_at')->exceptOnForms(),
      DateTime::make(__('roles.updated_at'),
        'updated_at')->exceptOnForms(),

      PermissionBooleanGroup::make(__('roles.permissions'),
        'permissions'),

      MorphToMany::make($userResource::label(), 'users', $userResource)
        ->searchable()
        ->singularLabel($userResource::singularLabel()),
    ];
  }

  /**
   * Get the cards available for the request.
   *
   * @param  Request  $request
   * @return array
   */
  public function cards(Request $request) {
    return [];
  }

  /**
   * Get the filters available for the resource.
   *
   * @param  Request  $request
   * @return array
   */
  public function filters(Request $request) {
    return [];
  }

  /**
   * Get the lenses available for the resource.
   *
   * @param  Request  $request
   * @return array
   */
  public function lenses(Request $request) {
    return [];
  }

  /**
   * Get the actions available for the resource.
   *
   * @param  Request  $request
   * @return array
   */
  public function actions(Request $request) {
    return [];
  }
}
