<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'max:150|required',
            'descricao' => 'max:200|required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => "Campo nome é obrigatório",
            'nome.max' => "Campo nome não pode ultrapassar :max caracteres",
            'descricao.required' => "Campo Descrição é obrigatório",
            'descricao.max' => "Campo descricao não pode ultrapassar :max caracteres",
        ];
    }
}
