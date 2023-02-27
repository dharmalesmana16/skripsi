<?php

use App\Http\Controllers\AntaresController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControllingController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LampsController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MonitoringDevicesController;
use App\Http\Controllers\MonitoringLampsController;
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
Route::get('/', [HomeController::class, 'index'])->middleware('checkAuth');
Route::get('/signout', [AuthController::class, 'logout']);
Route::controller(AuthController::class)->prefix('signin')->middleware('RedirectIfAuth')->group(function () {
    Route::get('', 'index');
    Route::post('', 'authenticate');
});
Route::controller(AuthController::class)->prefix('signup')->group(function () {
    Route::get('', 'signup');
    Route::post('', 'signup');
});
Route::controller(AntaresController::class)->prefix('api/antares')->group(function () {
    Route::get('action', 'action');
    Route::get('action/timer', 'action');
    Route::get('retdevice', 'retDataDevice');
    Route::get('retalldevice', 'retAllDataDevice');
    Route::get('retlastestdata/{devicename}', 'retLastestData');
});

// Route::get('/devices', [DevicesController::class, 'index']);
Route::controller(DevicesController::class)->prefix('devices')->middleware('checkAuth')->group(function () {
    Route::get('', 'index');
    Route::get('show/{meta}', 'show');
    Route::get('new', 'new');
    Route::get('update/{meta}', 'update');
    Route::put('update/{meta}', 'update');
    Route::post('new', 'new');
    // Route::post('devices/update/{meta}', 'update');
    // Route::post('/controlling/update', 'update');
});

Route::controller(ControllingController::class)->prefix('controls')->middleware('checkAuth')->group(function () {
    Route::get('', 'index');
    Route::get('timer/{id}', 'indextimer');
    Route::get('{meta}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('devices/update/{meta}', 'update');
    Route::post('devices/update/{meta}', 'update');
    // Route::post('/timer/{nama_state}', 'update');

    // Route::post('/controlling/update', 'update');
});
Route::controller(UsersController::class)->prefix('users')->middleware('checkAuth')->group(function () {
    Route::get('', 'index');
    Route::get('show/{meta}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('update/{meta}', 'update');
    Route::post('update/{meta}', 'update');
    // Route::post('/controlling/update', 'update');
});
Route::controller(LampsController::class)->prefix('lamps')->middleware('checkAuth')->group(function () {
    Route::get('', 'index');
    Route::get('show/{meta}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('update/{meta}', 'update');
    Route::put('update/{meta}', 'update');
    // Route::post('/controlling/update', 'update');
});
Route::controller(LogsController::class)->prefix('logs')->middleware('checkAuth')->group(function () {
    Route::get('', 'index');
    Route::get('show/{meta}', 'show');

    // Route::post('/controlling/update', 'update');
});
Route::controller(MaintenanceController::class)->prefix('maintenance')->middleware('checkAuth')->group(function () {
    Route::get('', 'index');
    Route::get('show/{meta}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');

    // Route::post('/controlling/update', 'update');
});

Route::get("/monitoring" . "/{device}", [MonitoringDevicesController::class, 'index'])->middleware('checkAuth');
Route::get("/monitoringlamp" . "/{nama_lampu}", [MonitoringLampsController::class, 'index'])->middleware('checkAuth');
