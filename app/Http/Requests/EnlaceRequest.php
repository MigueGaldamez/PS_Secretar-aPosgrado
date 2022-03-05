<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnlaceRequest extends FormRequest
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
            'link'=>'required|url|max:255',
        ];
    }
    public function messages()
    {
        return [
            'urlImagen.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 1 MB.',
            'titulo.*'=>'Ingrese un título no mayor a 100 caracteres.',
            'link.*'=>'Ingrese una URL válida.',
        ];
    }
}