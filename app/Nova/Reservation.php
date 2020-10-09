<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Reservation extends Resource{
  public static $model = \App\Models\Reservation::class;
  public static $title = 'id';
  public static $search = [
    'id',
  ];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),
    ];
  }
}
