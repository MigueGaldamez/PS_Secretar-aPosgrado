<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TesisRequest extends FormRequest
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
            'posgrado'=>'required|exists:posgrados,id',
            'publicado'=>'required|numeric|min:1800|max:3000',
            'titulo'=>'required|max:350',
            'autor'=>'required|max:255',
            'link'=>'required|max:255',
            //'link'=>'required|url|max:255',
            'estado'=>'required|boolean'
        ];
    }
    public function messages()
    {
        return [
            'posgrado.*'=>'Debe seleccionar un posgrado válido.',
            'publicado.*'=>'Ingrese una año válido.',
            'titulo.*'=>'Ingrese un titulo válido, que no exceda los 350 caracteres.',
            'autor.*'=>'Ingrese un autor/es válido,que no exceda los 255 caracteres.',
            'link.*'=>'Ingrese una url válida.',
            'estado.*'=>'Ingrese un estado válido.'
        ];
    }
}
