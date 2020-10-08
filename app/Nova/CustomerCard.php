<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use KirschbaumDevelopment\NovaComments\Commenter;

class CustomerCard extends Resource{
  public static $model = \App\Models\CustomerCard::class;
  public static $title = 'number';
  public static $search = [
    'id',
  ];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),
      Text::make('Number')
        ->sortable(),

      BelongsTo::make('Owner', 'owner', 'App\Nova\Customer'),

      new Commenter(),
    ];
  }
}
