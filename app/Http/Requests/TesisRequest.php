<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class TesisRequest extends FormRequest
{
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
            'estado'=>'required|boolean',
            'link'=>'required_if:estado,==,"1"|max:255',
            'link'=> 'exclude_if:estado,==,"0"|url',
            
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
