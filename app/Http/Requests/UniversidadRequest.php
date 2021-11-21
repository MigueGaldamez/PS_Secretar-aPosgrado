<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversidadRequest extends FormRequest
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
            'nombreUniversidad'=>['required','min:4','max:150'],
            'direccionUniversidad'=>['required','min:4','max:150'],

        ];
    }
    public function messages()
    {
        return [
            'nombreUniversidad.min'=>'Nombre debe tener minimo 4 caracteres',
            'direccionUniversidad.min'=>'Direccion debe tener minimo 4 caracteres',
            'nombreUniversidad.required'=>'Nombre es un campo requerido',
            'direccionUniversidad.required'=>'Direccion es un campo requerido',

        ];
    }
}
