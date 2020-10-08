<?php

Route::group(['middleware' => ['api']], function(){
  require 'api/customers.php';
  require 'api/instances.php';
  require 'api/devices.php';
  require 'api/games.php';
  require 'api/users.php';
  require 'api/bars.php';
});



