<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableNameEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreParagraphTransitionRequest;
use App\Http\Requests\Admin\UpdateParagraphTransitionRequest;
use App\Models\ParagpaphTransition;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ParagraphTransitionController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Переходы параграфов';
        $paragraphTransitions = ParagpaphTransition::orderBy('id')->paginate(10);
        return view('admin.paragraph_transition.index', [
            'title'                => $title,
            'paragraphTransitions' => $paragraphTransitions
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $paragraphTransition = ParagpaphTransition::find($id);
        $title = 'Переход с параграфа №' . $paragraphTransition->paragraph_number;
        return view('admin.paragraph_transition.show', [
            'title'               => $title,
            'paragraphTransition' => $paragraphTransition
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $paragraphTransition = ParagpaphTransition::find($id);
        $title = 'Редактирование: Перехода с параграфа №' . $paragraphTransition->paragraph_number;
        return view('admin.paragraph_transition.edit', [
            'title'               => $title,
            'paragraphTransition' => $paragraphTransition
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Переход между параграфами';
        return view('admin.paragraph_transition.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreParagraphTransitionRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreParagraphTransitionRequest $request): RedirectResponse
    {
        $paragpaphTransition = new ParagpaphTransition();
        $paragpaphTransition->paragraph_number = (int)$request->paragraph_number;
        $paragpaphTransition->to_paragraph_number = (int)$request->to_paragraph_number;
        $paragpaphTransition->title = (string)$request->title;
        $paragpaphTransition->created_at = new DateTime();
        $paragpaphTransition->updated_at = new DateTime();

        if (!$paragpaphTransition->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraph_transition.list')->with('success', 'Параграф успешно добавлен!');
    }

    /**
     * @param UpdateParagraphTransitionRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateParagraphTransitionRequest $request, int $id): RedirectResponse
    {
        $paragraphTransition = ParagpaphTransition::find($id);
        $paragraphTransition->paragraph_number = (int)$request->paragraph_number;
        $paragraphTransition->to_paragraph_number = (int)$request->to_paragraph_number;
        $paragraphTransition->title = (string)$request->title;
        $paragraphTransition->updated_at = new DateTime();
        if (!$paragraphTransition->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraph_transition.list')->with('success', 'Переход успешно обновлён');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        ParagpaphTransition::destroy($id);
        return redirect()->route('paragraph_transition.list')->with('success', 'Переход успешно удален!');
    }
}
