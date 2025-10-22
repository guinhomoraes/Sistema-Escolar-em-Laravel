<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoConteudoRequest extends FormRequest
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
            'tipo' => 'required|max:100'
        ];
    }

    public function messages() : array
    {
        return [
            'tipo.required' => "O campo tipo é obrigatório",
            'tipo.max' => "O tamanho máximo do campo é de :max caracteres"
        ];
    }
}
