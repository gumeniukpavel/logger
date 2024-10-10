<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoggerController;

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

Route::post('/log', [LoggerController::class, 'log'])->name('api.log.send');
Route::post('/log/all', [LoggerController::class, 'logToAll'])->name('api.log.sendToAll');
Route::post('/log/{type}', [LoggerController::class, 'logTo'])->name('api.log.sendTo');
