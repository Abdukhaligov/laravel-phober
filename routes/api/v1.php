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
  Route::get('findById/{id}', [GameController::class, 'show']);
  Route::get('findByGenre/{id}', [GameController::class, 'findByGenre']);
  Route::get('findByDevice/{id}', [GameController::class, 'findByDevice']);
  Route::get('findByRating/{value}', [GameController::class, 'findByRating']);
});

Route::prefix('devices')->group(function (){
  Route::get('/', [DeviceController::class, 'index']);
  Route::get('findById/{id}', [DeviceController::class, 'show']);
});

Route::prefix('device-instances')->group(function (){
  Route::get('/', [DeviceInstanceController::class, 'index']);
  Route::get('findById/{id}', [DeviceInstanceController::class, 'show']);
});

Route::middleware('auth:api')->group(function (){
  Route::get('user', [AuthController::class, 'user']);
});

Route::prefix('crm')->group(function (){
  Route::prefix('customers')->group(function (){
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('findById/{id}', [CustomerController::class, 'show']);
  });

  Route::prefix('loyalty-cards')->group(function (){
    Route::get('/', [LoyaltyCardController::class, 'index']);
    Route::get('findById/{id}', [LoyaltyCardController::class, 'show']);
  });
});