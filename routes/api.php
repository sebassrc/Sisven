<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DetalleController;
use App\Http\Controllers\api\ProductoController;

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


// Detalle APi rutas
Route::get('/detalles', [DetalleController::class, 'store'])->name('detalles.store');
Route::get('/detalles', [DetalleController::class, 'index'])->name('detalles');
Route::delete('/detalles{detalle}', [DetalleController::class, 'destroy'])->name('detalles.destroy');
Route::get('/detalles{detalle}', [DetalleController::class, 'show'])->name('detalles.show');
Route::put('/detalles{detalle}', [DetalleController::class, 'update'])->name('detalles.update');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos');