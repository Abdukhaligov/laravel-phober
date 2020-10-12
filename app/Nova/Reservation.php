<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;

class Reservation extends Resource{
  public static $model = \App\Models\Reservation::class;
  public static $title = 'id';
  public static $search = [
    'id',
  ];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),
      Text::make('Full name', 'full_name'),
      Text::make('Phone'),
      DateTime::make('date'),
      Text::make('Player count','player_count'),
      Text::make('Years old'),
      Text::make('Type'),
      Text::make('Note')->onlyOnDetail(),
    ];
  }
}
