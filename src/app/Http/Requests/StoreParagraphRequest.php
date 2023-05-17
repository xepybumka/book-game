<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParagraphRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'position' => [
                'required',
                'unique:paragraphs'
            ],
            'text' => [
                'required',
                'string'
            ],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'position.required' => 'Номер параграфа обязателен для ввода.',
            'position.unique' => 'Номер должен быть уникальным.',
            'text.required' => 'Текст параграфа обязателен для ввода.',
        ];
    }
}
