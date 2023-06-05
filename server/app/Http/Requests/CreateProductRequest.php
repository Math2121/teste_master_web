<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'nome' => 'required|string',
            'quantidade' => 'required|integer',

        ];
    }


    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome e obrigatório',
            'nome.string' => 'O campo nome precisa ser do tipo texto',
            'quantidade.required' => 'O campo quantidade precisa ser enviado',
            'quantidade.integer' => 'O campo quantidade precisa ser do tipo inteiro',

        ];
    }
}
