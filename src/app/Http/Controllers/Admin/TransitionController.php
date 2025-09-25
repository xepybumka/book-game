<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableNameEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTransitionRequest;
use App\Http\Requests\Admin\UpdateTransitionRequest;
use App\Models\Transition;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransitionController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Переходы параграфов';
        $transitions = DB::table(TableNameEnum::Transition->value)->orderBy('id')->paginate(10);
        return view('admin.transition.index', [
            'title' => $title,
            'transitions' => $transitions
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $transition = DB::table(TableNameEnum::Transition->value)->find($id);
        $title = 'Переход с параграфа №' . $transition->paragraph_number;
        return view('admin.transition.show', [
            'title' => $title,
            'transition' => $transition
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $transition = DB::table(TableNameEnum::Transition->value)->find($id);
        $title = 'Редактирование: Перехода с параграфа №' . $transition->paragraph_number;
        return view('admin.transition.edit', [
            'title' => $title,
            'transition' => $transition
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Переход между параграфами';
        return view('admin.transition.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreTransitionRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreTransitionRequest $request): RedirectResponse
    {
        $transition = new Transition();
        $transition->paragraph_number = (int)$request->paragraph_number;
        $transition->to_paragraph_number = (int)$request->to_paragraph_number;
        $transition->title = (string)$request->title;
        $transition->created_at = new DateTime();
        $transition->updated_at = new DateTime();

        if (!$transition->save()) {
            throw new Exception();
        }
        return redirect()->route('transition.list')->with('success', 'Параграф успешно добавлен!');
    }

    /**
     * @param UpdateTransitionRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateTransitionRequest $request, int $id): RedirectResponse
    {
        $transition = Transition::find($id);
        $transition->paragraph_number = (int)$request->paragraph_number;
        $transition->to_paragraph_number = (int)$request->to_paragraph_number;
        $transition->title = (string)$request->title;
        $transition->updated_at = new DateTime();
        if (!$transition->save()) {
            throw new Exception();
        }
        return redirect()->route('transition.list')->with('success', 'Переход успешно обновлён');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        DB::table(TableNameEnum::Transition->value)->delete($id);
        return redirect()->route('transition.list')->with('success', 'Переход успешно удален!');
    }
}
