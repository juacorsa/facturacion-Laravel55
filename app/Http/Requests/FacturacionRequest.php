<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturacionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'base' => 'required|numeric',
            'dominio' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'base.required' => 'El coste del servicio es un dato obligatorio.',
            'base.numeric'  => 'El coste del servicio no tiene el formato correcto.',
            'dominio.max'   => 'El dominio debe tener como máximo :max caracteres.'
        ];
    }    
}
