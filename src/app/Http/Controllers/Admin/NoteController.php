<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNoteRequest;
use App\Http\Requests\Admin\UpdateNoteRequest;
use App\Models\Note;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NoteController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'Заметки';
        $notes = Note::paginate(10);
        return view('admin.note.index', [
            'title' => $title,
            'notes' => $notes
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $title = 'Заметка №' . $id;
        $note = Note::find($id);
        return view('admin.note.show', [
            'title' => $title,
            'note'  => $note
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $title = 'Редактирование: Заметка №' . $id;
        $note = Note::find($id);
        return view('admin.note.edit', [
            'title' => $title,
            'note'  => $note
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $title = 'Создание: Заметка';
        return view('admin.note.create', [
            'title' => $title
        ]);
    }

    /**
     * @param StoreNoteRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreNoteRequest $request): RedirectResponse
    {
        $note = new Note();
        $note->text = (string)$request->text;
        $note->created_at = new DateTime();
        $note->updated_at = new DateTime();

        if (!$note->save()) {
            throw new Exception();
        }

        return redirect()->route('note.list')->with('success', 'Заметка успешно добавлена!');
    }

    /**
     * @param UpdateNoteRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateNoteRequest $request, int $id): RedirectResponse
    {
        $note = Note::find($id);
        $note->text = (string)$request->text;
        $note->updated_at = new DateTime();
        if (!$note->save()) {
            throw new Exception();
        }
        return redirect()->route('note.list')->with('success', 'Заметка успешно обновлёна');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Note::destroy($id);
        return redirect()->route('note.list')->with('success', 'Заметка успешно удален!');
    }
}
