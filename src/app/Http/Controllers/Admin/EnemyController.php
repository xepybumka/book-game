<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnemyRequest;
use App\Http\Requests\UpdateEnemyRequest;
use App\Models\Enemy;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnemyController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Противники';
        $enemies = Enemy::where('active', true)
            ->paginate(10);
        return view('admin.enemy.index', [
            'title' => $title,
            'enemies' => $enemies
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $title = 'Противник №' . $id;
        $enemy = Enemy::find($id);
        return view('admin.enemy.show', [
            'title' => $title,
            'enemy' => $enemy
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $title = 'Редактирование: Противник №' . $id;
        $enemy = Enemy::find($id);
        return view('admin.enemy.edit', [
            'title' => $title,
            'enemy' => $enemy
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Противник';
        return view('admin.enemy.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreEnemyRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreEnemyRequest $request): RedirectResponse
    {
        $enemy = new Enemy();
        $enemy->name = (string)$request->name;
        $enemy->power = (int)$request->power;
        $enemy->agility = (int)$request->agility;
        $enemy->active = true;
        $enemy->created_at = new DateTime();
        $enemy->updated_at = new DateTime();

        if (!$enemy->save()) {
            throw new Exception();
        }
        return redirect()->route('enemy.list')->with('success', 'Противник ' . $enemy->name . ' успешно добавлен!');
    }

    /**
     * @param UpdateEnemyRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateEnemyRequest $request, int $id)
    {
        $enemy = Enemy::find($id);
        $enemy->name = (string)$request->name;
        $enemy->power = (int)$request->power;
        $enemy->agility = (int)$request->agility;
        $enemy->updated_at = new DateTime();
        if (!$enemy->save()) {
            throw new Exception();
        }
        return redirect()->route('enemy.list')->with('success', 'Противник ' . $enemy->name . ' успешно обновлен!');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Enemy::destroy($id);
        return redirect()->route('enemy.list')->with('success', 'Предмет успешно удален!');
    }
}
