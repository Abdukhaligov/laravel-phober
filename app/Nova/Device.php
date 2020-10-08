<?php

namespace App\Nova;

use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use KirschbaumDevelopment\NovaComments\Commenter;

class Device extends Resource{
  public static $model = \App\Models\Device::class;
  public static $title = 'name';
  public static $search = [
    'id', 'name'
  ];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),
      Text::make("Name")
        ->sortable(),

      Textarea::make('Description')
        ->hideFromIndex(),

      Multilingual::make('Language')
        ->setLocales([
          'en' => 'English',
          'ru' => 'Russian',
          'az' => 'Azerbaijan',
        ])
        ->hideFromIndex(),

      BelongsToMany::make("Games"),
      new Commenter(),
    ];
  }
}
