<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\pay_modeController;
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
Route::get('/pay_mode', [pay_modelController::class, 'index'])->name('index');
Route::get('/pay_mode/create', [pay_modelController::class, 'create'])->name('pay_mode.create');
Route::post('/pay_mode', [pay_modelController::class, 'store'])->name('pay_mode.store');
Route::get('/pay_mode/{pay_mode}', [pay_modelController::class, 'show'])->name('pay_mode.show');
Route::get('/pay_mode/{pay_mode}/edit', [pay_modelController::class, 'edit'])->name('pay_mode.edit');
Route::put('/pay_mode/{pay_mode}', [pay_modelController::class, 'update'])->name('pay_mode.update');
Route::delete('/pay_mode/{pay_mode}', [pay_modelController::class, 'destroy'])->name('pay_mode.destroy');