<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ReservationType extends Resource{
  public static $model = \App\Models\ReservationType::class;
  public static $title = 'name';
  public static $group = "CRM";
  public static $search = [
    'id', 'name'
  ];

  public function fields(Request $request){
    return [
      ID::make(__('ID'), 'id')
        ->sortable(),

      Text::make("Name")
        ->sortable(),
    ];
  }
}
