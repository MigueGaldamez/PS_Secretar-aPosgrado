<?php

namespace App\Http\Controllers;

use App\Models\ReseniaHistorica;
use Illuminate\Http\Request;

class ReseniaHistoricaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return ReseniaHistorica::paginate($request->per_page);
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
            $resenia = new ReseniaHistorica();
       
            $resenia->anio = $request->anio;
            $resenia->descripcion = $request->descripcion;
            $resenia->importancia = $request->importancia;
           
         
            $resenia->save();
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReseniaHistorica  $reseniaHistorica
     * @return \Illuminate\Http\Response
     */
    public function show(ReseniaHistorica $reseniaHistorica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReseniaHistorica  $reseniaHistorica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReseniaHistorica $reseniaHistorica)
    {
        //
        try
        {
            $reseniaHistorica->update($request->all());
        }
        catch (\Exception $e) 
        {

            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReseniaHistorica  $reseniaHistorica
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReseniaHistorica $reseniaHistorica)
    {
        //
        $reseniaHistorica->delete();
    }
}
