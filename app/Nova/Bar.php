<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;

class Bar extends Resource{
  public static $model = \App\Models\Bar::class;
  public static $title = 'name';
  public static $search = [
    'id',
  ];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),
      Text::make("Name")
        ->rules(['required'])
        ->sortable(),
      Text::make("Price")
        ->rules(['required']),
      Number::make("Amount")
        ->rules(['required'])

    ];
  }
}
