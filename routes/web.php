<?php

use App\Http\Controllers\pay_modelController;
use Illuminate\Support\Facades\Route;
Route::resource('pay_mode', pay_modelController::class);
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


Route::get('/pay_mode', [pay_modelController::class, 'index'])->name('pay_mode.index');
Route::get('/pay_mode/create', [pay_modelController::class, 'create'])->name('pay_mode.create');
Route::post('/pay_mode', [pay_modelController::class, 'store'])->name('pay_mode.store');
Route::get('/pay_mode/{pay_mode}', [pay_modelController::class, 'show'])->name('pay_mode.show');
Route::get('/pay_mode/{pay_mode}/edit', [pay_modelController::class, 'edit'])->name('pay_mode.edit');
Route::put('/pay_mode/{pay_mode}', [pay_modelController::class, 'update'])->name('pay_mode.update');
Route::delete('/pay_mode/{pay_mode}', [pay_modelController::class, 'destroy'])->name('pay_mode.destroy');


require __DIR__.'/auth.php';
