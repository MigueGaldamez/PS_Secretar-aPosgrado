<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoTrabajoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'urlImagen'=>'exclude_if:imagen,false|image|max:1024',
            'nombre'=>'required|max:100',
            'cargo'=>'required|max:100',
            'descripcion'=>'required|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'urlImagen.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 1 MB',
            'nombre.*'=>'Ingrese un nombre válido, no mayor 100 caracteres',
            'cargo.*'=>'Ingrese un cargo válido, no mayor 100 caracteres',
            'descripcion.*'=>'Ingrese una descripción no mayor a 1,000 caracteres',
        ];
    }
}
