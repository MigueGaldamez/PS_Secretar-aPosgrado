<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class PerfilPasswordUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'ant' => 'password|required',
            'nue' => 'required|confirmed',
            'nue_confirmation'=>['required',Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()],
            
        ];
    }
    public function messages()
    {
        return [
            'ant.required'=>'Debes ingresar la contraseña actual.',
            'ant.password'=>'No coincide la contraseña actual.',
            'nue_confirmation.required'=>'Debes confirmar la nueva contraseña',
            'nue_confirmation.min'=>'La contraseña debe tener ser de 8 caracteres minimo',
            'nue_confirmation.letters'=>'Debe tener letras',
            'nue_confirmation.min->mixedCase'=>'Debe tener una letra mayússcula y una minúscula',
            'nue_confirmation.numbers'=>'Debe tener numeros',
            'nue_confirmation.symbols'=>'Debe tener simbolos',
            'nue.confirmed'=>'La contraseña debe coincidir',
            'nue.required'=>'Ingresa una contraseña',
            
        ];
    }
}
