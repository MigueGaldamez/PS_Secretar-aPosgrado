<?php

namespace App\Http\Controllers;

use App\Models\DetalleNoticia;
use Illuminate\Http\Request;

class DetalleNoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return DetalleNoticia::where('idNoticia','=',$request->idNoticia)->get();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleNoticia  $detalleNoticia
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleNoticia $detalleNoticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleNoticia  $detalleNoticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleNoticia $detalleNoticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleNoticia  $detalleNoticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleNoticia $detalleNoticia)
    {
        //
    }
}
