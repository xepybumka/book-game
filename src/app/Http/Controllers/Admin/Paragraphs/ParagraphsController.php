<?php

namespace App\Http\Controllers\Admin\Paragraphs;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParagraphRequest;
use App\Http\Requests\UpdateParagraphRequest;
use App\Models\Paragraph;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ParagraphsController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Параграфы';
        $paragraphs = Paragraph::where('active', true)
            ->orderBy('position')
            ->get();
        return view('admin.paragraphs.index', [
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
        $paragraph = '';
        return view('admin.paragraphs.show', [
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
        $paragraph = Paragraph::find($id);
        return view('admin.paragraphs.edit', [
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
        return view('admin.paragraphs.create', [
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
        $paragraph->position = (int)$request->position;
        $paragraph->text = (string)$request->text;
        $paragraph->active = true;
        $paragraph->created_at = new DateTime();
        $paragraph->updated_at = new DateTime();

        if (!$paragraph->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraphs.list')->with('success', 'Параграф успешно добавлен!');
    }

    /**
     * @param UpdateParagraphRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateParagraphRequest $request, int $id)
    {
        $paragraph = Paragraph::find($id);
        $paragraph->position = (int)$request->position;
        $paragraph->text = (string)$request->text;
        $paragraph->updated_at = new DateTime();
        if (!$paragraph->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraphs.list')->with('success', 'Параграф успешно обновлён');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Paragraph::destroy($id);
        return redirect()->route('paragraphs.list')->with('success', 'Параграф успешно удален!');
    }
}
