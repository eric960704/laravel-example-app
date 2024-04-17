<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BinanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'getUsers']);
Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::post('/user', [UserController::class, 'createUser']);
Route::patch('/user/{id}', [UserController::class, 'updateUser']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

Route::prefix('car_dealer')->group(function () {
    Route::get('/customers', [CustomerController::class, 'getCustomers']);
    Route::get('/customers/{office_id}', [CustomerController::class, 'getCustomersByOfficeId']);
    Route::post('/customer', [CustomerController::class,'createCustomer']);
    Route::patch('/customer/{id}', [CustomerController::class, 'updateCustomer']);
    Route::delete('/customer/{id}', [CustomerController::class, 'deleteCustomer']);

    Route::get('/office/{id}', [OfficeController::class, 'getOfficeById']);
});

Route::prefix('binance')->group(function () {
    Route::post('/price', [BinanceController::class, 'getPriceOfSymbol']);
});
