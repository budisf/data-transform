<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'customer'

], function ($router) {
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::post('/update', [CustomerController::class, 'update']);
    Route::post('/detail', [CustomerController::class, 'show']);
    Route::post('/delete', [CustomerController::class, 'destroy']);    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'order'

], function ($router) {
    Route::get('/transactions', [OrderController::class, 'index']);
    Route::post('/store', [OrderController::class, 'store']);
    Route::post('/update', [OrderController::class, 'update']);
    Route::post('/detail', [OrderController::class, 'show']);
    Route::post('/delete', [OrderController::class, 'destroy']);    
});
