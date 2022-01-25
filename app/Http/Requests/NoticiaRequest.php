<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'urlImagen'=>'exclude_if:imagen,false|image|max:1024',
            'titulo'=>'required|max:255',
            'publicado'=>'required|in:0,1',
        ];
    }
    public function messages()
    {
        return [
            'urlImagen.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 1 MB',
            'titulo.*'=>'Ingrese un título valido, no mayor a 255 caracteres',
            'publicado.*'=>'Ingresa un dato válido',
        ];
    }

}
