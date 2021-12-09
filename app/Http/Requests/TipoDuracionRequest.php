<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\TipoDuracion;
class TipoDuracionRequest extends FormRequest
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
        $duracion = TipoDuracion::get();
        return [
            'nombre'=>['required','max:40',Rule::unique('tipo_duracions','nombre')->ignore($this->id),],
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'Ingrese un nombre no mayor a 40 caracteres y único',
        ];
    }
}
