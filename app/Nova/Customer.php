<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use KirschbaumDevelopment\NovaComments\Commenter;

class Customer extends Resource{
  public static $model = \App\Models\Customer::class;
  public static $title = 'name';
  public static $search = [
    'id', 'name', 'email',
  ];

  public function fields(Request $request){
    return [
      ID::make()->sortable(),

      Text::make('First Name', 'first_name')
        ->sortable()
        ->rules('required', 'max:255'),

      Text::make('Last Name', 'last_name')
        ->sortable()
        ->rules('required', 'max:255'),

      Text::make('Email')
        ->sortable(),

      Select::make("Gender")
        ->options([true => "Male", false => "Female"])
        ->displayUsing(function($gender){
          return $gender? "Male": "Female";
        }),

      Date::make("Birthday"),

      BelongsTo::make('Author', 'author', User::class)
        ->onlyOnDetail(),

      new Commenter(),
    ];
  }
}
