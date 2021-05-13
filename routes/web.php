<?php

use App\Http\Controllers\Api\ClientApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/clientform', function () {
    return Inertia::render('Clintform');
})->middleware(['auth', 'verified'])->name('clientform');

Route::get('/clientlist', [ClientController::class, 'index'])->middleware(['auth', 'verified'])->name('clientlist');
Route::get('/clientupdate/{id}', [ClientController::class, 'updateView'])->middleware(['auth', 'verified'])->name('clientupdate');

Route::post('/clientform', [ClientApiController::class, 'create'])->middleware(['auth', 'verified']);
Route::put('/clientupdate/{id}', [ClientApiController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/clientdelete/{id}', [ClientApiController::class, 'delete'])->middleware(['auth', 'verified']);


Route::get('/productform', function () {
    return Inertia::render('Productform');
})->middleware(['auth', 'verified'])->name('productform');

Route::get('/productlist', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('productlist');
Route::get('/productupdate/{id}', [ProductController::class, 'updateView'])->middleware(['auth', 'verified'])->name('productupdate');

Route::post('/productform', [ProductApiController::class, 'create'])->middleware(['auth', 'verified']);
Route::put('/productupdate/{id}', [ProductApiController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/productdelete/{id}', [ProductApiController::class, 'delete'])->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
