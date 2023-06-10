<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;

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





Route::get('/', [\App\Http\Controllers\LibroController::class, 'indexc'])->name('libros.indexc');
Route::get('/indexc', [\App\Http\Controllers\LibroController::class, 'indexc'])->name('libros.indexc');
Route::get('/createc', [\App\Http\Controllers\LibroController::class, 'createc'])->name('libro.createc');
Route::post('/storec', [\App\Http\Controllers\LibroController::class, 'storec'])->name('libros.storec');
Route::get('/editc/{id}', [\App\Http\Controllers\LibroController::class, 'editc'])->name('libro.editc');
Route::put('/updatec/{id}', [\App\Http\Controllers\LibroController::class, 'updatec'])->name('libros.updatec');
Route::get('/showc/{id}', [\App\Http\Controllers\LibroController::class, 'showc'])->name('libros.showc');
Route::delete('/destroyc/{id}', [\App\Http\Controllers\LibroController::class, 'destroyc'])->name('libros.destroyc');
