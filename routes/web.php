<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntregaController;
// use App\Http\Controllers\HomeController;
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

Route::get('/entregas', [EntregaController::class, 'index']);
Route::post('/entregas', [EntregaController::class, 'store']);
Route::post('/entregas/{id}/update', [EntregaController::class, 'update']);
Route::get('/entregas/{id}/delete', [EntregaController::class, 'destroy']);
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
