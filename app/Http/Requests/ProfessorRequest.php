<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'id_usuario' => 'required',
            'id_escola' => 'required',
            'registro' => 'required',
            'salario' => 'required',
            'status' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'id_usuario.required' => "O campo Usuário é obrigatório",
            'id_escola.required' => "O campo Escola é obrigatório",
            'registro.required' => "O campo Registro é obrigatório",
            'salario.required' => "O campo Salario é obrigatório",
            'status.required' => "O campo Status é obrigatório"
        ];
    }
}
