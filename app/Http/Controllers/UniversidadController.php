<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;
use App\Http\Requests\UniversidadRequest;
class UniversidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $per_page=$request->per_page;
        return Universidad::paginate($per_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversidadRequest $request)
    {
        
        $universidad = new Universidad();
        $universidad->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function show(Universidad $universidad)
    {
        //
        return $universidad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function update(UniversidadRequest $request, Universidad $universidad)
    {
        //
        $universidad->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Universidad $universidad)
    {
        //
        $universidad->delete();
    }
}
