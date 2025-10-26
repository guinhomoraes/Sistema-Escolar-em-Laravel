<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max:100',
            'descricao' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'titulo.required' => "O campo titulo é obrigatório",
            'titulo.max' => "O tamanho máximo do campo é de :max caracteres",
            'descricao.required' => "O campo descrição é obrigatório"
        ];
    }
}
