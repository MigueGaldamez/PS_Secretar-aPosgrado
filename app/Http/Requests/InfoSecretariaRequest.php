<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoSecretariaRequest extends FormRequest
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
            'urlLogo'=>'exclude_if:imagen,false|image|max:1024',
            'quienesSomos'=>'required|max:1000',
            'mision'=>'required|max:1000',
            'vision'=>'required|max:1000',
            'correo'=>'required|max:255',
            'horarioAtencion'=>'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'urlLogo.*'=>'Ingrese un archivo de tipo imagen, maximo de tamaño de 1 MB',
            'quienesSomos.*'=>'Ingresa ¿Quiénes somo?, Máximo 1000 caracteres',
            'mision.*'=>'Ingresa una misión, máximo 1000 caracteres',
            'vision.*'=>'Ingresa una visión, máximo 1000 caracteres',
            'correo.*'=>'Ingresa informacion de contacto, máximo 255 caracteres',
            'horarioAtencion.*'=>'Ingresa un horario de atención válido, máximo 255 caracteres',
        ];
    }
}
