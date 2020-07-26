<?php

Route::group(['middleware' => ['api']], function(){
  Route::resource('customers', 'Api\CustomerController');
  Route::resource('instances', 'Api\InstanceController');

  Route::post('login', 'Api\UserController@login');

  Route::group(['middleware' => ['auth:api']], function(){
    Route::resource('users', 'Api\UserController');
    Route::post('details', 'Api\UserController@details');

    Route::put('profile/update', 'Api\UserController@update');
    Route::get('role/list', 'Api\RoleController@list');

  });

});



