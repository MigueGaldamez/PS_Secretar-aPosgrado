<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilPasswordUpdateRequest;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Models\Noticia;
use App\Models\OpcionPermiso;
use App\Models\Permiso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class PermisoController extends Controller
{
    public function usuarioPermisos(Request $request){
        $name  = $request->get('name');
        //return Facultades::with('posgrados')->get();
        $usuarios = User::where('id','!=',Auth::user()->id)->with('permiso')->name($name)->paginate($request->per_page);
        return $usuarios;
    }
    public function opcionesPermisos(){
        $opciones = OpcionPermiso::all();
        return $opciones;
    }
    public function cambiarPermiso(Request $request)
    {
        try
        {
            $permiso = Permiso::where('usuario_id','=',$request->idUsuario)->where('opcionPermiso_id','=',$request->idOpcionPermiso)->first();
            if($permiso)
            {
                $permiso->delete();
                return true;
            }
            else
            {
                $permisoNuevo = new Permiso();
                $permisoNuevo->usuario_id = $request->idUsuario;
                $permisoNuevo->opcionPermiso_id = $request->idOpcionPermiso;
                return $permisoNuevo->save();
            }  
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        } 
    }
    public function crearUsuario(UsuarioRequest $request)
    {
        try
        {
            $nuevoUsuario = new User();
            $nuevoUsuario->email = $request->correo;
            $nuevoUsuario->name = $request->name;
            $nuevoUsuario->password = Hash::make($request->contrasenia);
            return $nuevoUsuario->save(); 
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }

    }
    public function modificarUsuario(UsuarioUpdateRequest $request)
    {
        try
        {
            $usuario = User::find($request->id);
            $usuario->name = $request->name;
            $usuario->email = $request->correo;
            return $usuario->save(); 
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
 
    }
    public function cambiarEstado(Request $request)
    {
        try
        {
            $usuario = User::find($request->id);
            if($usuario->activo==0)
            {
                $usuario->activo=1;
            }
            else if($usuario->activo==1)
            {
                $usuario->activo=0;
            }
            return $usuario->save();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function enlaceIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',1)->first();
        if($permiso){
            return view('enlaces.index');
        }else{
            return view('errores.E404');
        }     
    }
    public function noticiaIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',2)->first();
        if($permiso){
            return view('noticias.index');
        }else{
            return view('errores.E404');
        }      
    }
    public function equipoTrabajoIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',3)->first();
        if($permiso){
            return view('equipoTrabajo.index');
        }else{
            return view('errores.E404');
        }     
    }
    public function facultadesIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',4)->first();
        if($permiso){
            return view('facultades.index');
        }else{
            return view('errores.E404');
        }     
    }
    public function diplomadoIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',5)->first();
        if($permiso){
            return view('diplomados.index');
        }else{
            return view('errores.E404');
        }
    }
    public function informacionIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',6)->first();
        if($permiso){
            return view('infoInstitucion.index');
        }else{
            return view('errores.E404');
        }
    }
    public function modalidadIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',7)->first();
        if($permiso){
            return view('modalidades.index');
        }else{
            return view('errores.E404');
        }
    }
    public function permisoIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',8)->first();
        if($permiso){
            return view('permisos.index');
        }else{
            return view('errores.E404');
        }
    }
    public function posgradoIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',9)->first();
        if($permiso){
            return view('posgrados.index');
        }else{
            return view('errores.E404');
        }
    }
    public function reseniaIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',10)->first();
        if($permiso){
            return view('reseniaHistorica.index');
        }else{
            return view('errores.E404');
        }
    }
    public function tesisIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',11)->first();
        if($permiso){
            return view('tesis.index');
        }else{
            return view('errores.E404');
        }
    }
    public function duracionIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',12)->first();
        if($permiso){
            return view('tipoDuracion.index');
        }else{
            return view('errores.E404');
        }
    }
    public function tipoProgramaIndex(){
        $usuario = User::find(Auth::user()->id);
        $permiso = Permiso::where('usuario_id','=',$usuario->id)->where('opcionPermiso_id','=',13)->first();
        if($permiso){
            return view('tipoPrograma.index');
        }else{
            return view('errores.E404');
        }
    }
    public function noticiaDetalleIndex(Noticia $noticia_id)//editar la noticia
    {
        return view('noticias.detalle', compact('noticia_id'));
    }
    public function noticiaCompleta(Noticia $noticia_id)//mostrar la noticia en sitio privado
    {
        return view('noticias.noticiaCompleta', compact('noticia_id'));
    }
    
    public function perfilIndex(){
        $usuario = User::find(Auth::user()->id);
        return view('perfil.index')->with('usuario');
    }
    public function permisoUsuarioP(){
        $usuario = User::find(Auth::user()->id);
        $permisos = Permiso::where('usuario_id','=',$usuario->id)->with('opcionPermiso')->get();
        return $permisos;
    }
    public function perfilUsuarioP(){
        $usuario = User::find(Auth::user()->id);
        return $usuario;
    }
    public function cambiarNombre(UsuarioUpdateRequest $request)
    {
        try
        {
            $usuario = User::find($request->id);
            $usuario->name = $request->name;
            return $usuario->save();
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }

    }
    public function cambiarPass(PerfilPasswordUpdateRequest $request)
    {
        try
        {
            $usuario = User::find($request->id);
            return $usuario->fill(['password' => Hash::make($request->nue)])->save();
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }

        
    }
}
