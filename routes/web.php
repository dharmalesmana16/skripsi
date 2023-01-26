<?php

use App\Http\Controllers\ControllingController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
    return view('home.index');
});
// Route::get('/devices', [DevicesController::class, 'index']);
Route::controller(DevicesController::class)->prefix('devices')->group(function () {
    Route::get('', 'index');
    Route::get('show/{meta}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('devices/update/{meta}', 'update');
    Route::post('devices/update/{meta}', 'update');
    // Route::post('/controlling/update', 'update');
});

Route::controller(ControllingController::class)->prefix('controls')->group(function () {
    Route::get('', 'index');
    Route::get('{meta}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('devices/update/{meta}', 'update');
    Route::post('devices/update/{meta}', 'update');
    // Route::post('/controlling/update', 'update');
});
Route::controller(UsersController::class)->prefix('users')->group(function () {
    Route::get('', 'index');
    Route::get('show/{meta}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('update/{meta}', 'update');
    Route::post('update/{meta}', 'update');
    // Route::post('/controlling/update', 'update');
});
// Route::controller(LampsController::class)->prefix('users')->group(function () {
//     Route::get('', 'index');
//     Route::get('{meta}', 'show');
//     Route::get('new', 'new');
//     Route::post('new', 'new');
//     Route::get('devices/update/{meta}', 'update');
//     Route::post('devices/update/{meta}', 'update');
//     // Route::post('/controlling/update', 'update');
// });