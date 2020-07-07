<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Text;

class Role extends Resource {
  public static $model = \App\Models\Role::class;
  public static $title = 'name';
  public static $search = ['name'];

  public function title() {
    return strtoupper(parent::title());
  }

  public function fields(Request $request) {
    return [
        Text::make('Name')
            ->sortable()
            ->rules('required', 'max:255')
            ->displayUsing(function ($r) {
              return strtoupper($r);
            }),

        BelongsToMany::make("Users")
    ];
  }

  public function viewAny(User $user) {
    return $user->isAdmin();
  }
}
