<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:30|unique:empresas'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la empresa es un dato obligatorio.',
            'nombre.max'      => 'El nombre de la empresa debe tener como máximo :max caracteres.',
            'nombre.unique'   => 'La empresa indicada ya existe en la base de datos'
        ];
    }    
}
