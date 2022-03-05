<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required|max:100',
            'correo'=>'required|max:100|email|unique:users,email',
            'contrasenia'=>['required',Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
        ];
    }
    public function messages()
    {
        return [
            'name.*'=>'Ingrese un nombre valido, no mayor a 100 caracteres',
            'correo.*'=>'Ingrese un correo válido y que no este ya registrado',
            'contrasenia.*'=>'La contraseña debe tener almenos una letra mayúscula, una minúscula y un símbolo',
        ];
    }
}
