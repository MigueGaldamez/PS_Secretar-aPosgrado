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
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            
        ];
    }
    public function messages()
    {
        return [
            'ant.*'=>'No coincide la contraseña actual.',
            'nue_confirmation.*'=>'La contraseña debe tener almenos una letra mayúscula, una minúscula y un símbolo y debe ser igual a la confirmación.',
            'nue.confirmed'=>'La contraseña debe coincidir',
            'nue.required'=>'La contraseña debe coincidir',
            
        ];
    }
}
