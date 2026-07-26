<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\StoreCharacterRequest;
use App\Http\Requests\Core\UpdateCharacterRequest;
use App\Models\Character;
use DateTime;
use Exception;
use Illuminate\Http\JsonResponse;

class CharacterController extends Controller
{
    private function getUser()
    {
        return Character::find(Character::CHARACTER_STATIC_ID);
    }

    /**
     * @param StoreCharacterRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(StoreCharacterRequest $request)
    {
        $character = $this->getUser();

        $character->dexterity = (int)$request->dexterity;
        $character->strength = (int)$request->strenght;
        $character->charm = (int)$request->charm;
        $character->mind_power = (int)$request->mind_power;
        $character->gold = (int)$request->gold;
        $character->food = (int)$request->food;
        $character->weapon_id = (int)$request->weapon_id;
        $character->created_at = new DateTime();
        $character->updated_at = new DateTime();

        if (!$character->save()) {
            throw new Exception();
        }
        return response()->json(['success' => true]);
    }

    /**
     * @param UpdateCharacterRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function update(UpdateCharacterRequest $request)
    {
        $character = $this->getUser();

        $character->dexterity = (int)$request->dexterity;
        $character->strength = (int)$request->strenght;
        $character->charm = (int)$request->charm;
        $character->mind_power = (int)$request->mind_power;
        $character->gold = (int)$request->gold;
        $character->food = (int)$request->food;
        $character->luck = (string)$request->luck;
        $character->weapon = (int)$request->weapon_id;
        $character->updated_at = new DateTime();
        if (!$character->save()) {
            throw new Exception();
        }
        return response()->json(['success' => true]);
    }
}
