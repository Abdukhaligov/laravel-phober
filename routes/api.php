<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api']], function(){
  Route::resource('customers', 'Api\CustomerController');


  Route::post('login', 'Api\UserController@login');

  Route::group(['middleware' => ['auth:api']], function(){
    Route::post('details', 'Api\UserController@details');
    Route::put('profile/update', 'Api\UserController@update');
    Route::get('user/list', 'Api\UserController@list');
    Route::get('role/list', 'Api\RoleController@list');

  });

  Route::get('/', function () {
    return response()->json(['Good Bye, World!'], 202);
  });

  Route::get('/instances/{id}', 'Api\InstanceController@show');

});



