<?php

namespace App\Http\Requests\Admin;

use App\Enums\EnemyAttackTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name'              => ['required', 'string'],
            'power'             => ['required', 'integer'],
            'attack_power'      => ['required', 'integer'],
            'enemy_attack_type' => ['required', Rule::enum(EnemyAttackTypeEnum::class)],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required'         => 'Обязательно наличие параметра "Название".',
            'power.required'        => 'Обязательно наличие параметра "Сила".',
            'attack_power.required' => 'Обязательно наличие параметра "Сила атаки".',
            'enemy_attack_type'     => 'Обязательно наличие параметра "Тип атаки".',
        ];
    }
}
