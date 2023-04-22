<?php

use App\Http\Controllers\MejaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
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

// Meja
Route::get('/getmeja',[MejaController::class,'getmeja']);
Route::get('/getmeja/{id}',[MejaController::class,'selectmeja']);

Route::post('/createmeja',[MejaController::class,'createmeja']);
Route::put('/updatemeja/{id}',[MejaController::class,'updatemeja']);    
Route::delete('/deletemeja/{id}',[MejaController::class,'deletemeja']);

// MENU
Route::get('/getmenu',[MenuController::class,'getmenu']);
Route::get('/getmenu/{id}',[MenuController::class,'selectmenu']);
Route::post('/createmenu',[MenuController::class,'createmenu']);
Route::put('/updatemenu/{id}',[MenuController::class,'updatemenu']);
Route::delete('/deletemenu/{id}',[MenuController::class,'deletemenu']); 