<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiplomadoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'facultad'=>'required|exists:facultades,id',
            'nombre'=>'required|max:200',
            'duracion'=>'required|numeric|min:0|max:250',
            'tipo_duracion'=>'required|exists:tipo_duracions,id',
            'modalidad'=>'required|exists:modalidades,id',
            'ofertado'=>'required|boolean'
        ];
    }
    public function messages()
    {
        return [
            'facultad.*'=>'Ingrese una facultad válida',
            'nombre.*'=>'Ingrese un nombre que no exceda 200 caracteres',
            'duracion.*'=>'Ingrese una cantidad válida',
            'tipo_duracion.*'=>'Ingrese un tipo de duración válido',
            'modalidad.*'=>'Ingrese una modalidad válida',
            'ofertado.*'=>'Ingrese el estado de ofertado válido.'
        ];
    }
}
