<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required|max:100',
            'correo'=>['exclude_if:perfil,true','required','max:100','email',Rule::unique('users','email')->ignore($this->id),],
        ];
    }
    public function messages()
    {
        return [
            'name.*'=>'Ingrese un nombre valido, no mayor a 100 caracteres',
            'correo.*'=>'Ingrese un correo válido y que no este ya registrado',
        ];
    }
}
