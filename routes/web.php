<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\EmpaqueController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\VentaController;

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

Route::get('bienvenido',[UsuarioController::class, 'bienvenido'])->name('bienvenido');
Route::view('/', 'auth/login')->name('login');
// Route::view('/', 'login')->name('login');

Route::resource('usuarios', UsuarioController::class);
Route::get('usuario_papelera',[UsuarioController::class, 'papelera'])->name('usuarios.papelera');
Route::delete('usuario_borrar/{id}',[UsuarioController::class, 'borrar'])->name('usuarios.borrar');
Route::delete('usuario_activar/{id}',[UsuarioController::class, 'activar'])->name('usuarios.activar');
Route::get('usuario_export',[UsuarioController::class, 'export'])->name('usuarios.export');

Route::put('updatefoto/{id}', [UsuarioController::class, 'updatefoto'])->name('updatefoto');
Route::put('updatepassword/{id}', [UsuarioController::class, 'updatepassword'])->name('updatepassword');
Route::get('perfil', [UsuarioController::class, 'perfil'])->name('perfil');


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

Route::resource('empaques', EmpaqueController::class);
Route::get('empaque_papelera',[EmpaqueController::class, 'papelera'])->name('empaques.papelera');
Route::delete('empaque_borrar/{empaque_id}',[EmpaqueController::class, 'borrar'])->name('empaques.borrar');
Route::delete('empaque_activar/{empaque_id}',[EmpaqueController::class, 'activar'])->name('empaques.activar');
Route::get('empaque_export',[EmpaqueController::class, 'export'])->name('empaques.export');

Route::resource('productos', ProductoController::class);
Route::get('producto_papelera',[ProductoController::class, 'papelera'])->name('productos.papelera');
Route::delete('producto_borrar/{producto_id}',[ProductoController::class, 'borrar'])->name('productos.borrar');
Route::delete('producto_activar/{producto_id}',[ProductoController::class, 'activar'])->name('productos.activar');
Route::get('producto_export',[ProductoController::class, 'export'])->name('productos.export');

Route::resource('sucursales', SucursalController::class);
Route::get('sucursal_papelera',[SucursalController::class, 'papelera'])->name('sucursales.papelera');
Route::delete('sucursal_borrar/{sucursal_id}',[SucursalController::class, 'borrar'])->name('sucursales.borrar');
Route::delete('sucursal_activar/{sucursal_id}',[SucursalController::class, 'activar'])->name('sucursales.activar');
Route::get('sucursal_export',[SucursalController::class, 'export'])->name('sucursales.export');

Route::get('get-municipios', [SucursalController::class, 'getMunicipios'])->name('getMunicipios');
Route::get('get-localidades', [SucursalController::class, 'getLocalidades'])->name('getLocalidades');

Route::resource('roles', RolController::class);
Route::get('rol_papelera',[RolController::class, 'papelera'])->name('roles.papelera');
// Route::delete('rol_borrar/{rol_id}',[RolController::class, 'borrar'])->name('roles.borrar');
// Route::delete('rol_activar/{rol_id}',[RolController::class, 'activar'])->name('roles.activar');
// Route::get('rol_export',[RolController::class, 'export'])->name('roles.export');

Route::resource('articulos', ArticuloController::class);
Route::get('articulo_papelera',[ArticuloController::class, 'papelera'])->name('articulos.papelera');
Route::delete('articulo_borrar/{articulo_id}',[ArticuloController::class, 'borrar'])->name('articulos.borrar');
Route::delete('articulo_activar/{articulo_id}',[ArticuloController::class, 'activar'])->name('articulos.activar');
Route::get('articulo_export',[ArticuloController::class, 'export'])->name('articulos.export');
Route::get('/datos1', [ArticuloController::class, 'datos1'])->name('datos1');

Route::resource('ventas', VentaController::class);
Route::get('venta_papelera',[VentaController::class, 'papelera'])->name('ventas.papelera');
Route::delete('venta_borrar/{venta_id}',[VentaController::class, 'borrar'])->name('ventas.borrar');
Route::delete('venta_activar/{venta_id}',[VentaController::class, 'activar'])->name('ventas.activar');
Route::get('venta_export',[VentaController::class, 'export'])->name('ventas.export');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
