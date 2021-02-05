<?php

namespace App\Nova;

use Illuminate\Http\Request;
use KirschbaumDevelopment\NovaComments\Commenter;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class LoyaltyCard extends Resource{
  public static $model = \App\Models\Cards\LoyaltyCard::class;
  public static $title = 'id';
  public static $group = "CRM";
  public static $search = [
    'id',
  ];

  public function fields(Request $request){
    return [
      ID::make(__('ID'), 'id')
        ->sortable(),

      Text::make('Number')
        ->sortable(),

      BelongsTo::make('Owner', 'owner', Customer::class),

      new Commenter(),
    ];
  }
}
