<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleryRequest extends FormRequest
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
            'titulo'=>'required|max:100',
            'subtitulo'=>'required|max:150',
        ];
    }
    public function messages()
    {
        return [
            'urlImagen.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 1 MB',
            'titulo.*'=>'Ingrese un título valido, no mayor a 100 caracteres',
            'subtitulo.*'=>'Ingrese un subtítulo valido, no mayor a 150 caracteres',
        ];
    }
}
