<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Reservation extends Resource{
  public static $model = \App\Models\Reservation::class;
  public static $title = 'id';
  public static $group = "Reservations";
  public static $search = [
    'id',
  ];

  public function fields(Request $request){
    return [
      ID::make(__('ID'), 'id')->sortable(),

      Text::make('Full name', 'full_name'),

      Text::make('Phone'),

      DateTime::make('Date'),

      Text::make('Player count', 'players_count'),

      Text::make('Players age', 'players_age'),

      Text::make('Note')->onlyOnDetail(),

      BelongsTo::make('Type', 'type', ReservationType::class),

      BelongsToMany::make('Device Instance', 'deviceInstances', DeviceInstance::class)
    ];
  }
}
