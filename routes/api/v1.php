<?php

use App\Http\Controllers\Api\V1\CRM\CustomerController;
use App\Http\Controllers\Api\V1\CRM\LoyaltyCardController;
use App\Http\Controllers\Api\V1\DeviceController;
use App\Http\Controllers\Api\V1\DeviceInstanceController;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function (){
  Route::post('login', [AuthController::class, 'login'])->name('login');
  Route::post('register', [AuthController::class, 'register'])->name('register');
  Route::get('user', [AuthController::class, 'user'])->middleware('auth:api')->name('user');
});


Route::prefix('games')->name('games.')->group(function (){
  Route::get('/', [GameController::class, 'index'])->name('index');
  Route::get('findById/{id}', [GameController::class, 'show'])->name('show');
  Route::get('findByGenreId/{id}', [GameController::class, 'findByGenreId'])->name('findByGenreId');
  Route::get('findByDeviceId/{id}', [GameController::class, 'findByDeviceId'])->name('findByDeviceId');
  Route::get('findByRating/{value}', [GameController::class, 'findByRating'])->name('findByRating');
});

Route::prefix('devices')->name('devices.')->group(function (){
  Route::get('/', [DeviceController::class, 'index'])->name('index');
  Route::get('findById/{id}', [DeviceController::class, 'show'])->name('show');
});

Route::prefix('device-instances')->name('device-instances.')->group(function (){
  Route::get('/', [DeviceInstanceController::class, 'index'])->name('index');
  Route::get('findById/{id}', [DeviceInstanceController::class, 'show'])->name('show');
});

Route::middleware('auth:api')->group(function (){
  Route::prefix('crm')->name('crm.')->group(function (){
    Route::prefix('customers')->name('customers.')->group(function (){
      Route::get('/', [CustomerController::class, 'index'])->name('index');
      Route::get('findById/{id}', [CustomerController::class, 'show'])->name('show');
      Route::get('findByLoyaltyCardNumber/{number}', [CustomerController::class, 'findByLoyaltyCardNumber'])->name('findByLoyaltyCardNumber');
      Route::get('findByLoyaltyCardId/{id}', [CustomerController::class, 'findByLoyaltyCardId'])->name('findByLoyaltyCardId');
    });

    Route::prefix('loyalty-cards')->name('loyalty-cards.')->group(function (){
      Route::get('/', [LoyaltyCardController::class, 'index'])->name('index');
      Route::get('findById/{id}', [LoyaltyCardController::class, 'show'])->name('show');
    });
  });
});