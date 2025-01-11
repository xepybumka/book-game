<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableNameEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreParagraphRequest;
use App\Http\Requests\Admin\UpdateParagraphRequest;
use App\Models\Paragraph;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ParagraphController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Параграфы';
        $paragraphs = DB::table(TableNameEnum::Paragraph->value)->orderBy('number')->paginate(10);
        return view('admin.paragraph.index', [
            'title' => $title,
            'paragraphs' => $paragraphs
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $title = 'Параграф №' . $id;
        $paragraph = DB::table(TableNameEnum::Paragraph->value)->find($id);
        return view('admin.paragraph.show', [
            'title' => $title,
            'paragraph' => $paragraph
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $title = 'Редактирование: Параграф №' . $id;
        $paragraph = DB::table(TableNameEnum::Paragraph->value)->find($id);
        return view('admin.paragraph.edit', [
            'title' => $title,
            'paragraph' => $paragraph
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Параграф';
        return view('admin.paragraph.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreParagraphRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreParagraphRequest $request): RedirectResponse
    {
        $paragraph = new Paragraph();
        $paragraph->number = (int)$request->number;
        $paragraph->text = (string)$request->text;
        $paragraph->created_at = new DateTime();
        $paragraph->updated_at = new DateTime();

        if (!$paragraph->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraph.list')->with('success', 'Параграф успешно добавлен!');
    }

    /**
     * @param UpdateParagraphRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateParagraphRequest $request, int $id): RedirectResponse
    {
        $paragraph = Paragraph::find($id);
        $paragraph->number = (int)$request->number;
        $paragraph->text = (string)$request->text;
        $paragraph->updated_at = new DateTime();
        if (!$paragraph->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraph.list')->with('success', 'Параграф успешно обновлён');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        DB::table(TableNameEnum::Paragraph->value)->delete($id);
        return redirect()->route('paragraph.list')->with('success', 'Параграф успешно удален!');
    }
}
