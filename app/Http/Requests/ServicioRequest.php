<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:80|unique:servicios'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del servicio es un dato obligatorio.',
            'nombre.max'      => 'El nombre del servicio debe tener como máximo :max caracteres.',
            'nombre.unique'   => 'El servicio indicado ya existe en la base de datos'
        ];
    }       
}
