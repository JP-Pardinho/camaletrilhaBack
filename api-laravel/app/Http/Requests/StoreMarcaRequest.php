<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMarcaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'unique:marcas', 'min:3'],
            'imagem' => ['required', 'image']
        ];
    }

    public function messages(): array
    {
        return [
            'nome.unique' => 'O nome da marca já existe.',
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O nome da marca deve ter no minimo 3 caracteres.',
            'imagem.image' => 'O arquivo tem que ser uma imagem'
        ];
    }
}
