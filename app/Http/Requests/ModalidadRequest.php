<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ModalidadRequest extends FormRequest
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
            'color'=>['required',Rule::in(['Azul', 'Verde', 'Rojo', 'Amarillo', 'Gris'])],
            'nombre'=>['required','max:40',Rule::unique('modalidades','nombre')->ignore($this->id),],
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'Ingrese un nombre no mayor a 40 caracteres  y único',
            'color.*'=>'Ingrese un color válido',
        ];
    }
}
