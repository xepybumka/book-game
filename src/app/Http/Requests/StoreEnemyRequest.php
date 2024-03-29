<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnemyRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'power' => ['required', 'integer'],
            'agility' => ['required', 'integer'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Обязательно наличие параметра "Название".',
            'power.required' => 'Обязательно наличие параметра "Сила".',
            'agility.required' => 'Обязательно наличие параметра "Ловкость".',
        ];
    }
}
