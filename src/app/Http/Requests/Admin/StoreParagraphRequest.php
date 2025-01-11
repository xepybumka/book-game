<?php

namespace App\Http\Requests\Admin;

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
            'number' => [
                'required',
                'unique:paragraph'
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
            'number.required' => 'Номер параграфа обязателен для ввода.',
            'number.unique' => 'Номер должен быть уникальным.',
            'text.required' => 'Текст параграфа обязателен для ввода.',
        ];
    }
}
