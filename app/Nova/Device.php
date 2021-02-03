<?php

namespace App\Nova;

use Illuminate\Http\Request;
use KirschbaumDevelopment\NovaComments\Commenter;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Device extends Resource{
  public static $model = \App\Models\Device::class;
  public static $title = 'name';
  public static $search = [
    'id', 'name'
  ];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),

      Text::make("Name")->sortable(),

      NovaTabTranslatable::make([
        Textarea::make(__('Description'), 'description')
      ])->hideFromIndex(),

      BelongsToMany::make("Games"),

      new Commenter(),
    ];
  }
}
