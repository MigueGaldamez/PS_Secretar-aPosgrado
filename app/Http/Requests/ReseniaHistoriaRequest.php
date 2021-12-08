<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReseniaHistoriaRequest extends FormRequest
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
            'anio'=>'required|numeric|min:1800|max:2300',
            'importancia'=>'required|numeric|min:1|max:3',
            'descripcion'=>'required|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'anio.*'=>'Ingrese un año válido',
            'importancia.*'=>'Ingrese un grando de importancia válido',
            'descripcion.*'=>'La descripción debe ser no mayor a 1000 caracteres',
        ];
    }
}
