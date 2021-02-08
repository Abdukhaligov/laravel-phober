<?php

namespace App\Nova;

use Illuminate\Http\Request;
use KirschbaumDevelopment\NovaComments\Commenter;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class DeviceInstance extends Resource{
  public static $model = \App\Models\DeviceInstance::class;
  public static $title = 'id';
  public static $group = "Games & Devices";
  public static $search = [
    'id'
  ];

  public function title(){
    /** @var \App\Models\DeviceInstance $this */
    return $this->device->name. " ".$this->order." (#".$this->id.")";
  }

  public function fields(Request $request){
    return [
      ID::make(__('ID'), 'id')
        ->sortable(),

      BelongsTo::make("Device"),

      Boolean::make("Active"),

      DateTime::make("Deactivation start", "deactivation_start")
        ->nullable(),

      DateTime::make("Deactivation end", "deactivation_end")
        ->nullable(),

      new Commenter(),
    ];
  }
}
