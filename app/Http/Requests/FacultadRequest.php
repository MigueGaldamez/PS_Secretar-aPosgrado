<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultadRequest extends FormRequest
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
            'nombre'=>'required|max:60',
            'contactoDiplomado'=>'required|max:120',
            'contactoPosgrado'=>'required|max:120',
            'color'=>'required|max:7',
            'multidis'=>'required|boolean',
            'descripcion'=>'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'urlImagen.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 1 MB',
            'nombre.*'=>'Ingrese un nombre válido máximo 60 caractertes',
            'contactoDiplomado.*'=>'Ingrese un contacto de Diplomado válido, máximo 120 caracteres',
            'contactoPosgrado.*'=>'Ingrese un contacto de Posgrado válido, máximo 120 caracteres',
            'color.*'=>'Ingrese un color válido en HEX',
            'multidis.*'=>'Ingrese un valor válido',
            'descripcion.*'=>'Ingrese una descripción válida, máximo de 255 caracteres',
        ];
    }
}
