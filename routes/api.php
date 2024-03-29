<?php

use App\Http\Controllers\API\DataLoadController;
use App\Http\Controllers\API\DataLoadMallController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('v1/data-load', DataLoadController::class);
Route::resource('v1/data-load-mall', DataLoadMallController::class);
//Route::prefix('')->resource();