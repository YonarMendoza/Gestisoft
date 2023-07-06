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
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/generar-pdf/{Nom_unidad}',[App\Http\Controllers\semovientePDFController::class, 'generarPDF'])->name('generar-pdf');
Route::get('/raza/pdf', [App\Http\Controllers\RazaController::class, 'pdf'])->name('razapdf');
Route::get('/unidad/pdf', [App\Http\Controllers\UnidadController::class, 'pdf'])->name('unidadpdf');
// Route::get('/semoviente/pdf', [App\Http\Controllers\SemovienteController::class, 'pdf'])->name('semovientepdf');
Route::get('/novedad/pdf', [App\Http\Controllers\NovedadController::class, 'pdf'])->name('novedadpdf');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/raza', App\Http\Controllers\RazaController::class);
Route::get('/agregarRaza', [App\Http\Controllers\RazaController::class, 'agregar']);
Route::resource('/unidad', App\Http\Controllers\UnidadController::class);
Route::get('/agregarUnidad', [App\Http\Controllers\UnidadController::class, 'agregar']);
Route::resource('/semoviente', App\Http\Controllers\SemovienteController::class);
Route::get('/agregarSemoviente', [App\Http\Controllers\SemovienteController::class, 'agregar']);
Route::resource('/novedad', App\Http\Controllers\NovedadController::class);
Route::get('/agregarNovedad', [App\Http\Controllers\NovedadController::class, 'agregar']);
Route::get('/centroRazaBuscar/{cadena}', [App\Http\Controllers\RazaController::class,'centroRazaBuscar']);
Route::resource('/index', App\Http\Controllers\IndexController::class);
Route::resource('/caprinos', App\Http\Controllers\CaprinosController::class);
Route::resource('/cunicultura', App\Http\Controllers\CuniculturaController::class);
Route::resource('/ganaderia', App\Http\Controllers\GanaderiaController::class);
Route::resource('/ovinos', App\Http\Controllers\OvinosController::class);
Route::get('/centroUnidadBuscar/{cadena}', [App\Http\Controllers\UnidadController::class,'centroUnidadBuscar']);
Route::resource('/quienes', App\Http\Controllers\QuienessomosController::class);
Route::get('/centroSemovienteBuscar/{cadena}', [App\Http\Controllers\SemovienteController::class,'centroSemovienteBuscar']);
Route::get('/centroNovedadBuscar/{cadena}', [App\Http\Controllers\NovedadController::class,'centroNovedadBuscar']);
Route::get('/contarRazas', [App\Http\Controllers\RazaController::class, 'contarRazas']);
Route::get('/contarUnidades', [App\Http\Controllers\UnidadController::class, 'contarUnidades']);
Route::get('/contarSemovientes', [App\Http\Controllers\SemovienteController::class, 'contarSemovientes']);
Route::get('/contarNovedades', [App\Http\Controllers\NovedadController::class, 'contarNovedades']);
Route::put('/cambiarEstadoSemoviente', [App\Http\Controllers\SemovienteController::class, 'cambiarEstadoSemoviente']);
Route::resource('/usuarios', App\Http\Controllers\UsuariosController::class);
Route::get('/centroUsuarioBuscar/{cadena}', [App\Http\Controllers\UsuariosController::class,'centroUsuarioBuscar']);
Route::get('/contarUsuarios', [App\Http\Controllers\UsuariosController::class, 'contarUsuarios']);
Route::get('/agregarUsuarios', [App\Http\Controllers\UsuariosController::class, 'agregar']);
Route::resource('/responsable', App\Http\Controllers\ResponsableController::class);
Route::get('/centroResponsableBuscar/{cadena}', [App\Http\Controllers\ResponsableController::class,'centroResponsableBuscar']);
Route::get('/contarResponsables', [App\Http\Controllers\ResponsableController::class, 'contarResponsables']);
Route::get('/agregarResponsable', [App\Http\Controllers\ResponsableController::class, 'agregar']);

