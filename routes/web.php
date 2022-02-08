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
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ModalidadesController;
use App\Http\Controllers\PosgradoController;
use App\Http\Controllers\TipoDuracionController;
use App\Http\Controllers\TipoProgramaController;
use App\Http\Controllers\ReseniaHistoricaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\TesiController;
use App\Http\Controllers\PublicoController;
use App\Http\Controllers\PermisoController;

Route::get('/', [PublicoController::class, 'inicio'])->name('inicio');
Route::middleware('auth')->group(function () 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    //Informacion de la secretaria
    Route::apiResource('dashboard/informacion', InformacionController::class)->except(['create', 'store', 'update', 'destroy']);
    Route::post('dashboard/informacion/{informacion}', [InformacionController::class,'update']);
    Route::get('dashboard/informacion_secretaria', [PermisoController::class,'informacionIndex'])->name('Informacion');
    //Valores
    Route::apiResource('dashboard/valores', ValoresController::class)->except(['show', 'update','show']);
    Route::get('dashboard/get_valores/{informacion_id}', [ValoresController::class,'getValores']);
    //Facultades
    Route::apiResource('dashboard/facultad_api', FacultadesController::class)->except(['update', 'destroy','show']);
    Route::post('dashboard/facultad_api/{facultad}', [FacultadesController::class,'update']);
    Route::get('dashboard/facultades', [PermisoController::class, 'facultadesIndex'])->name('Facultades');
    Route::get('dashboard/facultades_list', [FacultadesController::class,'list']);//listBox
    //enlaces
    Route::get('dashboard/enlaces', [PermisoController::class,'enlaceIndex'])->name('Enlaces');
    Route::apiResource('dashboard/enlaces_api', EnlaceController::class)->except(['update','show']);
    Route::post('dashboard/enlaces_api/{enlaces_api}', [EnlaceController::class,'update']);
    Route::get('dashboard/enlaces_list', [EnlaceController::class,'list']);//listBox
    //Diplomados
    Route::get('dashboard/diplomados', [PermisoController::class,'diplomadoIndex'] )->name('Diplomados');
    Route::apiResource('dashboard/diplomados_api', DiplomadoController::class)->except(['show']);
    Route::get('dashboard/diplomados_list', [DiplomadoController::class,'list']);//listBox
    //posgrados
    Route::get('dashboard/posgrados',  [PermisoController::class,'posgradoIndex'])->name('Posgrados');
    Route::apiResource('dashboard/posgrados_api', PosgradoController::class)->except(['show','update']);
    Route::post('dashboard/posgrados_api/{posgrados_api}', [PosgradoController::class,'update']);
    Route::get('dashboard/posgrados_list/{facultad}', [PosgradoController::class,'list']);//listBox
    //tesis
    Route::get('dashboard/tesis',  [PermisoController::class,'tesisIndex'])->name('Tesis');
    Route::apiResource('dashboard/tesis_api', TesiController::class)->except(['show']);
    Route::get('dashboard/tesis_list', [ TesiController::class,'list']);//listBox
    //Galery
    Route::view('dashboard/galery', 'galery.index')->name('Galery');
    Route::apiResource('dashboard/galery_api', GaleryController::class)->except(['show','update']);
    Route::post('dashboard/galery_api/{galery_api}', [GaleryController::class,'update']);
                            //mantenimientos de tablas opciones
    //modalidad
    Route::get('dashboard/modalidades', [PermisoController::class,'modalidadIndex'])->name('Modalidades');
    Route::apiResource('dashboard/modalidades_api', ModalidadesController::class)->except(['show']);
    //tipo duracion
    Route::get('dashboard/tipo_duracions', [PermisoController::class,'duracionIndex'])->name('TipoDuracions');
    Route::apiResource('dashboard/tipo_duracions_api', TipoDuracionController::class)->except(['show']);
    //tipo programa
    Route::get('dashboard/tipo_programas', [PermisoController::class,'tipoProgramaIndex'])->name('TipoProgramas');
    Route::apiResource('dashboard/tipo_programas_api', TipoProgramaController::class)->except(['show']);
                            //FIN mantenimientos de tablas opciones
    //Equipo trabajo
    Route::get('dashboard/equipo_trabajo', [PermisoController::class,'equipoTrabajoIndex'])->name('EquipoTrabajo');
    Route::apiResource('dashboard/equipoTrabajo', EquipoTrabajoController::class)->except(['update','show']);
    Route::post('dashboard/equipoTrabajo/{equipoTrabajo}', [EquipoTrabajoController::class,'update']);
    //Resenias Historicas
    Route::get('dashboard/resenia_historica', [PermisoController::class,'reseniaIndex'])->name('ReseniaHistorica');
    Route::apiResource('dashboard/reseniaHistorica', ReseniaHistoricaController::class);
    //Noticias
    Route::get('dashboard/noticias', [PermisoController::class,'noticiaIndex'])->name('NoticiasGestion');
    Route::get('dashboard/noticia/{noticia_id}/detalle',[PermisoController::class,'noticiaDetalleIndex'])->name('NoticiaDetalle');
    Route::get('dashboard/noticia/{noticia_id}',[PermisoController::class,'noticiaCompleta'])->name('NoticiaCompleta');
    Route::apiResource('dashboard/noticia_api', NoticiaController::class)->except(['update','show']);
    Route::post('dashboard/noticia_api/{noticia_api}', [NoticiaController::class,'update']);
    Route::put('dashboard/noticia/{noticia_id}/detalle', [NoticiaController::class,'detalleNoticiaGuardar'])->name('detalleNoticiaGuardar');
    //Permisos
    Route::get('dashboard/permisos', [PermisoController::class,'permisoIndex'])->name('Permisos');
    Route::get('dashboard/usuariosPermisos/',[PermisoController::class,'usuarioPermisos'])->name('usuarioPermisos');
    Route::get('dashboard/opcionesPermisos/',[PermisoController::class,'opcionesPermisos'])->name('opcionesPermisos');
    Route::post('dashboard/modificarPermiso/',[PermisoController::class,'cambiarPermiso'])->name('cambiarPermiso');
    Route::post('dashboard/crearUsuario/',[PermisoController::class,'crearUsuario'])->name('crearUsuario');
    Route::post('dashboard/modificarUsuario/',[PermisoController::class,'modificarUsuario'])->name('modificarUsuario');
    Route::post('dashboard/cambiarEstado/',[PermisoController::class,'cambiarEstado'])->name('cambiarEstado');

    //Perfil
    Route::get('dashboard/perfil', [PermisoController::class,'perfilIndex'])->name('Perfil');
    Route::get('dashboard/permisoUsuarioP', [PermisoController::class,'permisoUsuarioP'])->name('permisoUsuarioP');
    Route::get('dashboard/perfilUsuarioP', [PermisoController::class,'perfilUsuarioP'])->name('perfilUsuarioP');
    
});
//publico
Route::get('/publicaciones', [App\Http\Controllers\PublicoController::class, 'publicaciones'])->name('publicaciones');
Route::get('/oferta', [App\Http\Controllers\PublicoController::class, 'oferta'])->name('oferta');
Route::get('/ofertaFacultad/{slug}', [App\Http\Controllers\PublicoController::class, 'ofertaFacultad'])->name('ofertaFacultad');
Route::get('/reseña', [App\Http\Controllers\PublicoController::class, 'reseña'])->name('reseña');
Route::get('/enlaces', [App\Http\Controllers\PublicoController::class, 'enlaces'])->name('enlaces');
Route::get('/preguntasFrecuentes', [App\Http\Controllers\PublicoController::class, 'preguntasFrecuentes'])->name('preguntasFrecuentes');

Route::get('/noticias', [App\Http\Controllers\PublicoController::class, 'noticias'])->name('noticias');
Route::get('/noticias_todas', [App\Http\Controllers\PublicoController::class, 'noticiasTodas'])->name('noticiasTodas');
Route::get('/noticia/{slug}', [App\Http\Controllers\PublicoController::class, 'noticia'])->name('noticia');

Route::get('/diplomados', [App\Http\Controllers\PublicoController::class, 'diplomados'])->name('diplomados');
Route::get('/investigaciones', [App\Http\Controllers\PublicoController::class, 'investigaciones'])->name('investigaciones');
Route::get('/organosGobierno', [App\Http\Controllers\PublicoController::class, 'organos'])->name('organos');
Route::get('/educacionContinua', [App\Http\Controllers\PublicoController::class, 'educacionContinua'])->name('educacionContinua');
Route::get('/educacionContinua/{id}', [App\Http\Controllers\PublicoController::class, 'educacionContinuaFacultad'])->name('eduacioncontinua.facultad');
Route::get('/tesisPosgrados', [App\Http\Controllers\PublicoController::class, 'tesisPosgrados'])->name('tesisPosgrados');
Route::get('/catalogo', [App\Http\Controllers\PublicoController::class, 'catalogo'])->name('catalogo');
Route::get('/galeria', [App\Http\Controllers\PublicoController::class, 'galeria'])->name('galeria');
Route::get('/tesisPosgrados', [App\Http\Controllers\PublicoController::class, 'tesisPosgrados'])->name('tesisPosgrados');
Route::get('/descargar/catalogo/',[App\Http\Controllers\PublicoController::class, 'descargarCatalogo'])->name('descargar.catalogo');
Route::get('/facultades/conTesis', [FacultadesController::class, 'facultadesConTesis'])->name('fac.con.tesis');
Route::get('/facultades/conInv', [FacultadesController::class, 'facultadesConInv'])->name('fac.con.inv');
Route::get('/facultades/fac', [FacultadesController::class, 'facultadesF'])->name('fac.fac');
Route::get('/facultades/sed', [FacultadesController::class, 'facultadesS'])->name('fac.sed');
Route::get('/catalogo', [PublicoController::class, 'catalogoC'])->name('catalogoC');
Route::get('/ObtenerFacultad/Oferta', [FacultadesController::class, 'getFacultadbyId'])->name('fac.by.id');

// Authentication Routes...
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
// Password Reset Routes...
Route::get('password/confirm','App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm');
Route::post('password/confirm','App\Http\Controllers\Auth\ConfirmPasswordController@confirm');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm');