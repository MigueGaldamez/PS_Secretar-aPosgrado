<?php

namespace App\Http\Controllers;
use App\Http\Requests\ReseniaHistoriaRequest;
use App\Models\ReseniaHistorica;
use Illuminate\Http\Request;

class ReseniaHistoricaController extends Controller
{
    public function index(Request $request)
    {
        return ReseniaHistorica::paginate($request->per_page);
    }
    public function store(ReseniaHistoriaRequest $request)
    {
        try
        {          
            $resenia = new ReseniaHistorica();
            $resenia->anio = $request->anio;
            $resenia->descripcion = $request->descripcion;
            $resenia->importancia = $request->importancia;
            return $resenia->save();
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function update(ReseniaHistoriaRequest $request, ReseniaHistorica $reseniaHistorica)
    {
        try
        {
            return $reseniaHistorica->update($request->all());
        }
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    public function destroy(ReseniaHistorica $reseniaHistorica)
    {
        return $reseniaHistorica->delete();
    }
}
