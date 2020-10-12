<?php

Route::group(['middleware' => ['auth:api']], function(){
  Route::apiResource('bars', 'Api\BarController');
});
