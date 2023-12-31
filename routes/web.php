<?php

use App\Http\Controllers\DataLoadController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('load', LoadController::class)->middleware(['auth', 'verified']);
Route::resource('data-load', DataLoadController::class)->middleware(['auth', 'verified']);
Route::resource('report', ReportController::class)->middleware(['auth', 'verified']);
Route::get('/update-flow-sensor-chart', [ReportController::class, 'update_flow_sensor_chart'])->middleware(['auth', 'verified'])->name('update-flow-sensor-chart');
Route::get('/update-truck-load-chart', [ReportController::class, 'update_truck_load_chart'])->middleware(['auth', 'verified'])->name('update-truck-load-chart');