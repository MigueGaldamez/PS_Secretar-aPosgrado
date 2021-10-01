<?php

use App\Http\Controllers\UniversidadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\ValoresController;
use App\Http\Controllers\FacultadesController;
use App\Http\Controllers\EnlaceController;


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

/*
            [Ruta en el navegador]          [Controlador,               metodo]     [nombre]
Route::get('municipios/{municipio}/edit', [MunicipioController::class,'edit'])->name('municipios.edit');
*/

Route::get('/', [App\Http\Controllers\PublicoController::class, 'inicio'])->name('inicio');
Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
//Route::apiResource('/universidads', UniversidadController::class);
//Informacion de la secretaria
Route::apiResource('dashboard/informacion', InformacionController::class)->except(['create', 'store', 'update', 'destroy']);
Route::post('dashboard/informacion/{informacion}', [InformacionController::class,'update']);
Route::view('dashboard/informacion_secretaria', 'infoInstitucion.index')->name('Informacion');
//Valores
Route::apiResource('dashboard/valores', ValoresController::class)->except(['show', 'update','show']);
Route::get('dashboard/get_valores/{informacion_id}', [ValoresController::class,'getValores']);
//Facultades
Route::apiResource('dashboard/facultad_api', FacultadesController::class)->except(['update', 'destroy','show']);
Route::post('dashboard/facultad_api/{facultad}', [FacultadesController::class,'update']);
Route::view('dashboard/facultades', 'facultades.index')->name('Facultades');
//enlaces
Route::view('dashboard/enlaces', 'enlaces.index')->name('Enlaces');
Route::apiResource('dashboard/enlaces_api', EnlaceController::class)->except(['update','show']);
Route::post('dashboard/enlaces_api/{enlaces_api}', [EnlaceController::class,'update']);
