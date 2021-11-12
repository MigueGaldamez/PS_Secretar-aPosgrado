<?php

use App\Http\Controllers\DiplomadoController;
use App\Http\Controllers\UniversidadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\ValoresController;
use App\Http\Controllers\FacultadesController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\EquipoTrabajoController;
use App\Http\Controllers\ModalidadesController;
use App\Http\Controllers\PosgradoController;
use App\Http\Controllers\TipoDuracionController;
use App\Http\Controllers\TipoProgramaController;
use App\Http\Controllers\ReseniaHistoricaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\TesiController;
use App\Models\EquipoTrabajo;



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
//Diplomados
Route::view('dashboard/diplomados', 'diplomados.index')->name('Diplomados');
Route::apiResource('dashboard/diplomados_api', DiplomadoController::class)->except(['show']);
//posgrados
Route::view('dashboard/posgrados', 'posgrados.index')->name('Posgrados');
Route::apiResource('dashboard/posgrados_api', PosgradoController::class)->except(['show','update']);
Route::post('dashboard/posgrados_api/{posgrados_api}', [PosgradoController::class,'update']);
//tesis
Route::view('dashboard/tesis', 'tesis.index')->name('Tesis');
Route::apiResource('dashboard/tesis_api', TesiController::class)->except(['show']);
                        //mantenimientos de tablas opciones
//modalidad
Route::view('dashboard/modalidades', 'modalidades.index')->name('Modalidades');
Route::apiResource('dashboard/modalidades_api', ModalidadesController::class)->except(['show']);
//tipo duracion
Route::view('dashboard/tipo_duracions', 'tipoDuracion.index')->name('TipoDuracions');
Route::apiResource('dashboard/tipo_duracions_api', TipoDuracionController::class)->except(['show']);
//tipo programa
Route::view('dashboard/tipo_programas', 'tipoPrograma.index')->name('TipoProgramas');
Route::apiResource('dashboard/tipo_programas_api', TipoProgramaController::class)->except(['show']);
                        //FIN mantenimientos de tablas opciones
//Equipo trabajo

Route::view('dashboard/equipo_trabajo', 'equipoTrabajo.index')->name('EquipoTrabajo');
Route::apiResource('dashboard/equipoTrabajo', EquipoTrabajoController::class)->except(['update','show']);;
Route::post('dashboard/equipoTrabajo/{equipoTrabajo}', [EquipoTrabajoController::class,'update']);
//Resenias Historicas
Route::view('dashboard/resenia_historica', 'reseniaHistorica.index')->name('ReseniaHistorica');
Route::apiResource('dashboard/reseniaHistorica', ReseniaHistoricaController::class);
//Noticias
Route::view('dashboard/noticias', 'noticias.index')->name('NoticiasGestion');
Route::apiResource('dashboard/noticia', NoticiaController::class);
//fin de tablas de opciones

Route::get('/oferta', [App\Http\Controllers\PublicoController::class, 'oferta'])->name('oferta');
Route::get('/ofertaFacultad/{id}', [App\Http\Controllers\PublicoController::class, 'ofertaFacultad'])->name('ofertaFacultad');

Route::get('/reseña', [App\Http\Controllers\PublicoController::class, 'reseña'])->name('reseña');

Route::get('/enlaces', [App\Http\Controllers\PublicoController::class, 'enlaces'])->name('enlaces');

Route::get('/preguntasFrecuentes', [App\Http\Controllers\PublicoController::class, 'preguntasFrecuentes'])->name('preguntasFrecuentes');
Route::get('/noticias', [App\Http\Controllers\PublicoController::class, 'noticias'])->name('noticias');
Route::get('/noticia', [App\Http\Controllers\PublicoController::class, 'noticia'])->name('noticia');

Route::get('/diplomados', [App\Http\Controllers\PublicoController::class, 'diplomados'])->name('diplomados');


Route::get('/investigaciones', [App\Http\Controllers\PublicoController::class, 'investigaciones'])->name('investigaciones');

//N U E V A S
Route::get('/organosGobierno', [App\Http\Controllers\PublicoController::class, 'organos'])->name('organos');
Route::get('/educacionContinua', [App\Http\Controllers\PublicoController::class, 'educacionContinua'])->name('educacionContinua');
Route::get('/educacionContinua/{id}', [App\Http\Controllers\PublicoController::class, 'educacionContinuaFacultad'])->name('eduacioncontinua.facultad');
Route::get('/tesisPosgrados', [App\Http\Controllers\PublicoController::class, 'tesisPosgrados'])->name('tesisPosgrados');
Route::get('/catalogo', [App\Http\Controllers\PublicoController::class, 'catalogo'])->name('catalogo');
Route::get('/galeria', [App\Http\Controllers\PublicoController::class, 'galeria'])->name('galeria');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::apiResource('/universidads', UniversidadController::class);

//T E S I S    P O S G R A D O S 
Route::get('/tesisPosgrados', [App\Http\Controllers\PublicoController::class, 'tesisPosgrados'])->name('tesisPosgrados');
