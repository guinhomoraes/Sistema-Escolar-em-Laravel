<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'rg' => 'max:255|required',
            'cpf' => 'max:255|required',
            'endereco' => 'required',
            'bairro' => 'max:100|required',
            'cidade' => 'max:100|required',
            'estado' => 'max:100|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Campo Nome é obrigatório",
            'name.max' => "Campo Rg não pode ultrapassar :max caracteres",
            'email.required' => "Campo E-mail é obrigatório",
            'email.max' => "Campo E-mail não pode ultrapassar :max caracteres",
            'rg.required' => "Campo Rg é obrigatório",
            'rg.max' => "Campo Rg não pode ultrapassar :max caracteres",
            'cpf.required' => "Campo Cpf é obrigatório",
            'cpf.max' => "Campo Cpf não pode ultrapassar :max caracteres",
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
