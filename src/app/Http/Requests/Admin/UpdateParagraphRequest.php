<?php

namespace App\Http\Requests\Admin;

use App\Enums\TableNameEnum;
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
            'number' => [
                'required',
                Rule::unique(TableNameEnum::Paragraph->value, 'number')->ignore($this->id)
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
            'number.required' => 'Обязательно наличие параметра "Номер параграфа".',
            'number.unique' => 'Номер должен быть уникальным.',
            'text.required' => 'Обязательно наличие параметра "Текст".',
        ];
    }
}
