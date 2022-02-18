<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosgradoRequest extends FormRequest
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
            'facultad'=>'required|exists:facultades,id',
            'nombre'=>'required|max:200',
            'descripcion'=>'required|max:1000',
            'titulo'=>'required|max:200',
            'tipo_programa'=>'required|exists:tipo_programas,id',
            'ofertado'=>'required|boolean'
        ];
    }
    public function messages()
    {
        return [
            'urlImagen.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 1 MB',
            'facultad.*'=>'Debe de ingresar una facultad válida',
            'nombre.*'=>'Debe ingresar un nombre, 200 carateres máximo',
            'descripcion.*'=>'Debe ingresar una descripción, 100 carateres máximo',
            'titulo.*'=>'Debe ingresar un título, 200 carateres máximo',
            'tipo_programa.*'=>'Debe ingresar un tipo de programa válido',
            'ofertado.*'=>'Este campo es requerido.'
        ];
    }
}
