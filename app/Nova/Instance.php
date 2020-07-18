<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Instance extends Resource {
  public static $model = \App\Models\Instance::class;
  public static $title = 'id';
  public static $search = [
      'id',
  ];

  public function fields(Request $request) {
    return [
        ID::make()->sortable(),
        BelongsTo::make("Device"),
        Boolean::make("Active"),
        DateTime::make("Deactivation start", "deactivation_period_start")->nullable(),
        DateTime::make("Deactivation end", "deactivation_period_end")->nullable(),
    ];
  }
}
