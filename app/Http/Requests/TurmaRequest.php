<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
{
   public function rules(): array
    {
        return [
            'nome' => 'required',
            'descricao' => 'required',
            'id_escola' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'nome.required' => "O campo Nome é obrigatório",
            'descricao.required' => "O campo Descrição é obrigatório",
            'id_escola.required' => "O campo Escola é obrigatório",
        ];
    }
}
