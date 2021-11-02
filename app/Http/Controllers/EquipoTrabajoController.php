<?php

namespace App\Http\Controllers;

use App\Models\EquipoTrabajo;
use Illuminate\Http\Request;

class EquipoTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return EquipoTrabajo::paginate($request->perpage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try
        {          
            $equipo = new EquipoTrabajo();
       
            $equipo->nombre = $request->nombre;
            $equipo->descripcion = $request->descripcion;
            $equipo->cargo = $request->cargo;

            return $equipo->save();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipoTrabajo  $equipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(EquipoTrabajo $equipoTrabajo)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipoTrabajo  $equipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipoTrabajo $equipoTrabajo)
    {
        //
        try
        {   
            $equipoTrabajo->update($request->all());
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipoTrabajo  $equipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipoTrabajo $equipoTrabajo)
    {
        //
        $equipoTrabajo->delete();
    }
}
