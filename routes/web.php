<?php

use App\Http\Controllers\UniversidadController;
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



Route::get('/', [App\Http\Controllers\PublicoController::class, 'inicio'])->name('inicio');

Route::get('/oferta', [App\Http\Controllers\PublicoController::class, 'oferta'])->name('oferta');

Route::get('/reseña', [App\Http\Controllers\PublicoController::class, 'reseña'])->name('reseña');

Route::get('/enlaces', [App\Http\Controllers\PublicoController::class, 'enlaces'])->name('enlaces');

Route::get('/preguntasFrecuentes', [App\Http\Controllers\PublicoController::class, 'preguntasFrecuentes'])->name('preguntasFrecuentes');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::apiResource('/universidads', UniversidadController::class);

