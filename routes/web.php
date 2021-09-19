<?php

use App\Http\Controllers\UniversidadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformacionController;
use App\Models\Informacion;

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


Route::apiResource('/universidads', UniversidadController::class);



//Informacion de la secretaria
Route::apiResource('dashboard/informacion', InformacionController::class);
Route::view('dashboard/informacion_secretaria', 'infoInstitucion.index');
