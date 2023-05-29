<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/raza', App\Http\Controllers\RazaController::class);
Route::get('/agregarRaza', [App\Http\Controllers\RazaController::class, 'agregar']);
Route::resource('/unidad', App\Http\Controllers\UnidadController::class);
Route::get('/agregarUnidad', [App\Http\Controllers\UnidadController::class, 'agregar']);
Route::resource('/semoviente', App\Http\Controllers\SemovienteController::class);
Route::get('/agregarSemoviente', [App\Http\Controllers\SemovienteController::class, 'agregar']);
Route::resource('/novedad', App\Http\Controllers\NovedadController::class);
Route::get('/agregarNovedad', [App\Http\Controllers\NovedadController::class, 'agregar']);
Route::resource('/mortalidad', App\Http\Controllers\MortalidadController::class);
Route::get('/agregarMortalidad', [App\Http\Controllers\MortalidadController::class, 'agregar']);
Route::get('/centroRazaBuscar/{cadena}', [App\Http\Controllers\RazaController::class,'centroRazaBuscar']);
Route::resource('/index', App\Http\Controllers\IndexController::class);
Route::resource('/caprinos', App\Http\Controllers\CaprinosController::class);
Route::resource('/cunicultura', App\Http\Controllers\CuniculturaController::class);
Route::resource('/ganaderia', App\Http\Controllers\GanaderiaController::class);
Route::resource('/ovinos', App\Http\Controllers\OvinosController::class);
Route::get('/centroUnidadBuscar/{cadena}', [App\Http\Controllers\UnidadController::class,'centroUnidadBuscar']);
