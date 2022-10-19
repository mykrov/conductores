<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\AsignacionController;
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

Route::get('/condutores', [ConductorController::class, 'List'])->name('condutoreslist');
Route::get('/vehiculos', [VehiculoController::class, 'List'])->name('vehiculoslist');
Route::get('/asignaciones', [AsignacionController::class, 'List'])->name('asignacioneslist');
Route::post('/asignar', [AsignacionController::class, 'Asignar'])->name('asignar');
