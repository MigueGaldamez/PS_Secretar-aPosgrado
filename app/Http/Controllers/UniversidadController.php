<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;
use App\Http\Requests\UniversidadRequest;
class UniversidadController extends Controller
{
    public function index(Request $request)
    {
        $per_page=$request->per_page;
        return Universidad::paginate($per_page);
    }
    public function store(UniversidadRequest $request)
    {
        
        $universidad = new Universidad();
        $universidad->create($request->all());
    }
    public function show(Universidad $universidad)
    {
        return $universidad;
    }
    public function update(UniversidadRequest $request, Universidad $universidad)
    {
        $universidad->update($request->all());
    }
    public function destroy(Universidad $universidad)
    {
        $universidad->delete();
    }
}
