<?php

namespace App\Http\Requests\Admin;

use App\Enums\TableNameEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreParagraphItemRequest extends FormRequest
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
            'paragraph_number' => [
                'required',
                'integer',
                "exists:" . TableNameEnum::Paragraph->value . ",number",
            ],
            'item_id' => [
                'required',
                'integer',
                "exists:" . TableNameEnum::Item->value . ",id",
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
            'item_id.required' => 'Предмет обязателен для ввода.',
            'text.required' => 'Текст параграфа обязателен для ввода.',
            'paragraph_number.exists' => 'Указанный исходный параграф не существует.',
            'item_id.exists' => 'Такого предмета не существует.',
        ];
    }
}
