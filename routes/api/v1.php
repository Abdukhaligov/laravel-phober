<?php

use App\Http\Controllers\Api\V1\CRM\CustomerController;
use App\Http\Controllers\Api\V1\CRM\LoyaltyCardController;
use App\Http\Controllers\Api\V1\DeviceController;
use App\Http\Controllers\Api\V1\DeviceInstanceController;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::prefix('games')->group(function (){
  Route::get('/', [GameController::class, 'index']);
  Route::get('findBy/id/{id}', [GameController::class, 'show']);
  Route::get('findBy/genre/id/{id}', [GameController::class, 'findByGenre']);
  Route::get('findBy/device/id/{id}', [GameController::class, 'findByDevice']);
  Route::get('findBy/rating/{value}', [GameController::class, 'findByRating']);
});

Route::prefix('devices')->group(function (){
  Route::get('/', [DeviceController::class, 'index']);
  Route::get('findBy/id/{id}', [DeviceController::class, 'show']);
});

Route::prefix('device-instances')->group(function (){
  Route::get('/', [DeviceInstanceController::class, 'index']);
  Route::get('findBy/id/{id}', [DeviceInstanceController::class, 'show']);
});

Route::middleware('auth:api')->group(function (){
  Route::get('user', [AuthController::class, 'user']);

  Route::prefix('crm')->group(function (){
    Route::prefix('customers')->group(function (){
      Route::get('/', [CustomerController::class, 'index']);
      Route::get('findBy/id/{id}', [CustomerController::class, 'show']);
      Route::get('findBy/loyaltyCard/number/{number}', [CustomerController::class, 'findByLoyaltyCardNumber']);
      Route::get('findBy/loyaltyCard/id/{id}', [CustomerController::class, 'findByLoyaltyCardId']);
    });

    Route::prefix('loyalty-cards')->group(function (){
      Route::get('/', [LoyaltyCardController::class, 'index']);
      Route::get('findBy/id/{id}', [LoyaltyCardController::class, 'show']);
    });
  });
});