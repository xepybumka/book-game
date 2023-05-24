<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateParagraphRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'position' => [
                'required',
                Rule::unique('paragraphs', 'position')->ignore($this->id)
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
            'position.required' => 'Обязательно наличие параметра "Номер параграфа".',
            'position.unique' => 'Номер должен быть уникальным.',
            'text.required' => 'Обязательно наличие параметра "Текст".',
        ];
    }
}
