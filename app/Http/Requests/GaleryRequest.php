<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $input = [
            'orden' => ["1","2","3","4"],
        ];
        return [
            'urlImagen'=>'exclude_if:imagen,false|image|max:10240',
            'titulo'=>'max:100',
            'subtitulo'=>'max:150',
            'orden'=>'required|in:1,2,3,4',
        ];
    }
    public function messages()
    {
        return [
            'urlImagen.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 10 MB',
            'titulo.*'=>'Ingrese un título valido, no mayor a 100 caracteres',
            'subtitulo.*'=>'Ingrese un subtítulo valido, no mayor a 150 caracteres',
            'orden.*'=>'Ingrese una categoría válida',
        ];
    }
}
