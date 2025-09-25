<?php

namespace App\Http\Requests\Admin;

use App\Enums\TableNameEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTransitionRequest extends FormRequest
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
            'paragraph_number' => [
                'required',
                'integer',
                "exists:" . TableNameEnum::Paragraph->value . ",number",
            ],
            'to_paragraph_number' => [
                'required',
                'integer',
                "exists:" . TableNameEnum::Paragraph->value . ",number",
            ],
            'title' => [
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
            'paragraph_number.required' => 'Номер параграфа обязателен для ввода.',
            'to_paragraph_number.required' => 'Номер параграфа обязателен для ввода.',
            'text.required' => 'Текст параграфа обязателен для ввода.',
            'paragraph_number.exists' => 'Указанный исходный параграф не существует.',
            'to_paragraph_number.exists' => 'Указанный целевой параграф не существует.',
        ];
    }
}
