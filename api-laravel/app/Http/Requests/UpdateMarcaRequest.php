<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMarcaRequest extends FormRequest
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
            'nome' => [
                'sometimes',
                'min:3',
                Rule::unique('marcas', 'nome')->ignore($this->route('marca'))
            ],

            'imagem' => 'sometimes'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.unique' => 'O nome da marca já existe.',
            'nome.min' => 'O nome da marca deve ter no minimo 3 caracteres.'
        ];
    }
}
