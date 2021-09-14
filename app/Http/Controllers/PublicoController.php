<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicoController extends Controller
{
    //
    public function inicio()
    {
        return view('publico.index');
    }
}
