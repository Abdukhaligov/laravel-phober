<?php

Route::group(['middleware' => ['auth:api']], function(){
  Route::apiResource('customers', 'Api\CustomerController');
  Route::apiResource('customers-cards', 'Api\CustomerCardController');
});

