<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableNameEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWeaponRequest;
use App\Http\Requests\Admin\UpdateWeaponRequest;
use App\Models\Weapon;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
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
        $weapons = DB::table(TableNameEnum::Weapon->value)->orderBy('id')->paginate(10);

        return view('admin.weapon.index', [
            'title'   => $title,
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
        $weapon = DB::table(TableNameEnum::Weapon->value)->find($id);
        return view('admin.weapon.show', [
            'title'  => $title,
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
        $weapon = DB::table(TableNameEnum::Weapon->value)
            ->find($id);
        return view('admin.weapon.edit', [
            'title'  => $title,
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
        $weapon = new Weapon();
        $weapon->name = (string)$request->name;
        $weapon->power = (int)$request->power;
        $weapon->created_at = new DateTime();
        $weapon->updated_at = new DateTime();

        if (!$weapon->save()) {
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
    public function update(UpdateWeaponRequest $request, int $id): RedirectResponse
    {
        $weapon = Weapon::find($id);
        $weapon->name = (string)$request->name;
        $weapon->power = (int)$request->power;
        $weapon->updated_at = new DateTime();

        if (!$weapon->save()) {
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
        DB::table(TableNameEnum::Weapon->value)->delete($id);
        return redirect()->route('weapon.list')->with('success', 'Оружие успешно удален!');
    }
}
