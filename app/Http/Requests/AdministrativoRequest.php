<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministrativoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'id_usuario' => 'required',
            'id_escola' => 'required',
            'id_cargo' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'id_usuario.required' => "O campo Usuário é obrigatório",
            'id_escola.required' => "O campo Escola é obrigatório",
            'id_cargo.required' => "O campo Cargo é obrigatório"
        ];
    }
}
