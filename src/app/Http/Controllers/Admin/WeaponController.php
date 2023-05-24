<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWeaponRequest;
use App\Http\Requests\UpdateWeaponRequest;
use App\Models\Weapon;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WeaponController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Оружие';
        $weapons = Weapon::where('active', true)
            ->orderBy('id')
            ->paginate(10);
        return view('admin.weapon.index', [
            'title' => $title,
            'weapons' => $weapons
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $title = 'Оружие №' . $id;
        $weapon = '';
        return view('admin.weapon.show', [
            'title' => $title,
            'weapon' => $weapon
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $title = 'Редактирование: Оружие №' . $id;
        $weapon = Weapon::find($id);
        return view('admin.weapon.edit', [
            'title' => $title,
            'weapon' => $weapon
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Оружие';
        return view('admin.weapon.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreWeaponRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreWeaponRequest $request): RedirectResponse
    {
        $paragraph = new Weapon();
        $paragraph->name = (string)$request->text;
        $paragraph->power = (int)$request->power;
        $paragraph->active = true;
        $paragraph->created_at = new DateTime();
        $paragraph->updated_at = new DateTime();

        if (!$paragraph->save()) {
            throw new Exception();
        }
        return redirect()->route('weapon.list')->with('success', 'Оружие успешно добавлено!');
    }

    /**
     * @param UpdateParagraphRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateWeaponRequest $request, int $id)
    {
        $paragraph = Weapon::find($id);
        $paragraph->name = (string)$request->name;
        $paragraph->power = (int)$request->power;
        $paragraph->updated_at = new DateTime();
        if (!$paragraph->save()) {
            throw new Exception();
        }
        return redirect()->route('weapon.list')->with('success', 'Оружие успешно обновлёно');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Weapon::destroy($id);
        return redirect()->route('weapon.list')->with('success', 'Оружие успешно удален!');
    }
}
