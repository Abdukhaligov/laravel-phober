<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Media;
use Illuminate\Http\Request;
use KirschbaumDevelopment\NovaComments\Commenter;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Media24si\NovaYoutubeField\Youtube;
use Nikaia\Rating\Rating;

class Game extends Resource{
  public static $model = \App\Models\Game::class;
  public static $title = 'name';
  public static $group = "Games & Devices";
  public static $search = [
    'id', 'name', 'slug', 'description'
  ];

  public function fields(Request $request){
    return [
      ID::make(__('ID'), 'id')
        ->sortable(),

      Media::make('Preview', 'preview'),

      Text::make("Name")
        ->sortable(),

      Text::make("Slug")
        ->sortable(),

      Youtube::make('Video'),

      Rating::make('Rating')
        ->min(0)
        ->max(5)
        ->increment(1)
        ->sortable(),

      Boolean::make("Multiplayer"),

      NovaTabTranslatable::make([Textarea::make(__('Description'), 'description')])
        ->hideFromIndex(),

      BelongsToMany::make("Devices"),

      BelongsToMany::make("Genres"),

      new Commenter(),
    ];
  }
}
