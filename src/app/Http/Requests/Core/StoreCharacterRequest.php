<?php

namespace App\Http\Requests\Core;

use App\Enums\TableNameEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreCharacterRequest extends FormRequest
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
            'dexterity'  => ['required', 'integer'],
            'strength'   => ['required', 'integer'],
            'charm'      => ['required', 'integer'],
            'mind_power' => ['required', 'integer'],

            'gold' => ['required', 'integer'],
            'food' => ['required', 'integer'],

            'weapon_id' => [
                'integer',
                "exists:" . TableNameEnum::Weapon->value . ",id",
            ],
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
