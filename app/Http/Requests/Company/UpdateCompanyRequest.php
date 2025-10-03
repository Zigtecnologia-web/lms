<?php
namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique('companies', 'name')->ignore($this->route('id')),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da empresa é obrigatório.',
            'name.string'   => 'O nome da empresa deve ser um texto.',
            'name.max'      => 'O nome da empresa não pode ter mais de 255 caracteres.',
            'name.unique'   => 'Já existe uma empresa com este nome.',
        ];
    }
}
