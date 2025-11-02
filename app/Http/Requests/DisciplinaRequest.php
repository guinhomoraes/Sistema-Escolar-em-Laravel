<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:150',
            'descricao' => 'required|max:200'
        ];
    }

    public function messages() : array
    {
        return [
            'nome.required' => "O campo nome é obrigatório",
            'nome.max' => "O tamanho máximo do campo nome é de :max caracteres",
            'descricao.required' => "O campo descrição é obrigatório",
            'descricao.max' => "O tamanho máximo do campo descricao é de :max caracteres",
        ];
    }
}
