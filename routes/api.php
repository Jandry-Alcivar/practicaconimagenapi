<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
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

Route::resource('categoria',CategoriaController::class)->only('index','store','destroy','show');
Route::post('categoria/{id}',[CategoriaController::class,'update']);
Route::post('producto/{id}',[ProductoController::class,'update']);
Route::resource('producto',ProductoController::class)->only('index','store','destroy','show');
