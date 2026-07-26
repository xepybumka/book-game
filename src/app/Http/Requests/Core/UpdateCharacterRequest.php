<?php

namespace App\Http\Requests\Core;

use App\Enums\TableNameEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'dexterity'             => ['sometimes|integer'],
            'strength'              => ['sometimes|integer'],
            'charm'                 => ['sometimes|integer'],
            'mind_power'            => ['sometimes|integer'],
            'gold'                  => ['sometimes|integer'],
            'food'                  => ['sometimes|integer'],
            'weapon_id'             => [
                'integer',
                "exists:" . TableNameEnum::Weapon->value . ",id",
            ],
            'used_luck_values'      => ['sometimes|array'],
            'used_luck_values.*'    => ['integer|min:1|max:6'],
            'base_stats'            => ['sometimes|array'],
            'base_stats.strength'   => ['integer'],
            'base_stats.dexterity'  => ['integer'],
            'base_stats.charm'      => ['integer'],
            'base_stats.mind_power' => ['integer'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [];
    }
}
