<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TemporadaController;

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

Route::view('/', 'bienvenido')->name('bienvenido');

Route::resource('categorias', CategoriaController::class);
Route::get('categoria_papelera',[CategoriaController::class, 'papelera'])->name('categorias.papelera');
Route::delete('categoria_borrar/{categoria_id}',[CategoriaController::class, 'borrar'])->name('categorias.borrar');
Route::delete('categoria_activar/{categoria_id}',[CategoriaController::class, 'activar'])->name('categorias.activar');
Route::get('categoria_export',[CategoriaController::class, 'export'])->name('categorias.export');

Route::resource('marcas',MarcaController::class);
Route::get('marca_papelera',[MarcaController::class, 'papelera'])->name('marcas.papelera');
Route::delete('marca_borrar/{marca_id}',[MarcaController::class, 'borrar'])->name('marcas.borrar');
Route::delete('marca_activar/{marca_id}',[MarcaController::class, 'activar'])->name('marcas.activar');
Route::get('marca_export',[MarcaController::class, 'export'])->name('marcas.export');

Route::resource('temporadas', TemporadaController::class);
Route::get('temporada_papelera',[TemporadaController::class, 'papelera'])->name('temporadas.papelera');
Route::delete('temporada_borrar/{temporada_id}',[TemporadaController::class, 'borrar'])->name('temporadas.borrar');
Route::delete('temporada_activar/{temporada_id}',[TemporadaController::class, 'activar'])->name('temporadas.activar');
Route::get('temporada_export',[TemporadaController::class, 'export'])->name('temporadas.export');