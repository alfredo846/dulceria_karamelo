<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;

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
Route::get('papelera',[CategoriaController::class, 'papelera'])->name('categorias.papelera');
Route::delete('borrar/{categoria_id}',[CategoriaController::class, 'borrar'])->name('categorias.borrar');
Route::delete('activar/{categoria_id}',[CategoriaController::class, 'activar'])->name('categorias.activar');
Route::get('export',[CategoriaController::class, 'export'])->name('categorias.export');

Route::resource('marcas',MarcaController::class);