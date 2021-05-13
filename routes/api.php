<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientApiController;
use App\Http\Controllers\ProductApiController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/me', [AuthController::class, 'me']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('/client')->group(function () {
    Route::get('/', [ClientApiController::class, 'index']);
    Route::get('/{id}', [ClientApiController::class, 'selectClient']);
    Route::post('/', [ClientApiController::class, 'create']);
    Route::put('/{id}', [ClientApiController::class, 'update']);
    Route::delete('/{id}', [ClientApiController::class, 'delete']);
});

Route::middleware('auth:sanctum')->prefix('/product')->group(function () {
    Route::get('/', [ProductApiController::class, 'index']);
    Route::get('/{id}', [ProductApiController::class, 'selectProduct']);
    Route::post('/', [ProductApiController::class, 'create']);
    Route::put('/{id}', [ProductApiController::class, 'update']);
    Route::delete('/{id}', [ProductApiController::class, 'delete']);
});

