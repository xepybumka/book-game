<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeaponRequest extends FormRequest
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
            'power' => ['required','integer'],
            'name' => ['required','string']
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Обязательно наличие параметра "Название" для оружия',
            'power.required' => 'Обязательно наличие параметра "Сила" для оружия',
        ];
    }
}
