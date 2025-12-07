<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscolaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'razao_social' => 'max:200|required',
            'nome_fantasia' => 'max:200|required',
            'codigo_escola' => 'max:20|required',
            'cnpj' => 'max:20|required',
            'endereco' => 'required',
            'bairro' => 'max:100|required',
            'cidade' => 'max:100|required',
            'estado' => 'max:100|required',
            'data_inauguracao' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'razao_social.required' => "Campo Razão Social é obrigatório",
            'razao_social.max' => "Campo Razão Social não pode ultrapassar :max caracteres",
            'nome_fantasia.required' => "Campo Nome Fantasia é obrigatório",
            'nome_fantasia.max' => "Campo Nome Fantasia não pode ultrapassar :max caracteres",
            'codigo_escola.required' => "Campo Código é obrigatório",
            'codigo_escola.max' => "Campo Código não pode ultrapassar :max caracteres",
            'cnpj.required' => "Campo Cnpj é obrigatório",
            'cnpj.max' => "Campo Cnpj não pode ultrapassar :max caracteres",
            'endereco.required' => "Campo Endereço é obrigatório",
            'bairro.required' => "Campo Bairro é obrigatório",
            'bairro.max' => "Campo Bairro não pode ultrapassar :max caracteres",
            'cidade.required' => "Campo Cidade é obrigatório",
            'cidade.max' => "Campo Cidade não pode ultrapassar :max caracteres",
            'estado.required' => "Campo Estado é obrigatório",
            'estado.max' => "Campo Estado não pode ultrapassar :max caracteres",
            'data_inauguracao.required' => "Campo Data de Inauguração é obrigatório",
        ];
    }
}
