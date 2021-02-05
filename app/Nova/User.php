<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\MorphToMany;
use App\Tools\NovaPermissionTool\Role;
use App\Tools\NovaPermissionTool\Permission;

class User extends Resource{
  public static $model = \App\Models\User::class;
  public static $title = 'full_name';
  public static $search = ['id', 'username', 'full_name', 'email',];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),

      Gravatar::make()->maxWidth(50),

      Text::make('Username')
        ->sortable()
        ->rules('required', 'max:255'),

      Text::make('Name')
        ->sortable()
        ->rules('required', 'max:255'),

      Text::make('Last Name', 'last_name')
        ->sortable()
        ->rules('required', 'max:255'),

      Text::make('Email')
        ->sortable()
        ->rules('required', 'email', 'max:254')
        ->creationRules('unique:users,email')
        ->updateRules('unique:users,email,{{resourceId}}'),

      Password::make('Password')
        ->onlyOnForms()
        ->creationRules('required', 'string', 'min:8')
        ->updateRules('nullable', 'string', 'min:8'),

      MorphToMany::make('Roles', 'roles', Role::class),
      MorphToMany::make('Permissions', 'permissions', Permission::class),
    ];
  }
}
