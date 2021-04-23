<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('gasto')->group(function(){
    Route::post('/', [App\Http\Controllers\GastoController::class, 'store'])->name('gasto.store');
    Route::patch('/{gasto}/', [App\Http\Controllers\GastoController::class, 'update'])->name('gasto.update');
    Route::delete('/{gasto}/', [App\Http\Controllers\GastoController::class, 'delete'])->name('gasto.delete');
});

Route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categoria.store');
