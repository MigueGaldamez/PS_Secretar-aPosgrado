<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValorRequest extends FormRequest
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
            'nombre'=>'max:50',
            'informacion_id'=>'required|exists:informacions,id',
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'Ingrese un valor no mayor a 50 caracteres',
            'informacion_id.*'=>'Hay un error al enlazarlo con  la información',
        ];
    }
}
