<?php

namespace App\Http\Controllers\Admin\Paragraphs;

use App\Http\Controllers\Controller;
use App\Models\Paragraph;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ParagraphsController extends Controller
{
    /**
     *
     * @return View
     */
    public function index(): View
    {
        //TODO:: add pagination
        $title = 'Параграфы';
        $paragraphs = Paragraph::where('active', true)->get();
        return view('admin.paragraphs.index',[
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
        return view('admin.paragraphs.show',[
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
        return view('admin.paragraphs.edit',[
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
        return view('admin.paragraphs.create',[
            'title' => $title
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request): RedirectResponse
    {
        $position = (int) $request->get('position');
        $text = (string) $request->get('text');

        //TODO:: move to the middleware
        $rules = [
            'position' =>  ['required', 'unique:paragraphs'],
            'text' => 'required',
        ];
        $params = [
            'position.required' => 'Номер параграфа обязателен для ввода',
            'position.unique' => 'Параграф с таким номером уже есть в базе данных',
            'text.required' => 'Текст параграфа обязателен для ввода',
        ];
        $request->validate($rules, $params);
        $paragraph = new Paragraph();
        $paragraph->position = $position;
        $paragraph->text = $text;
        $paragraph->active = true;
        $paragraph->created_at = new DateTime();
        $paragraph->updated_at = new DateTime();

        if (!$paragraph->save()) {
            throw new Exception();
        }
        return redirect()->route('paragraphs.list')->with('success', 'Параграф успешно добавлен!');
    }

     public function update(Request $request, int $id)
     {
         $rules = [
             'position' =>  ['required', 'unique:paragraphs'],
             'text' => 'required',
         ];
         $params = [
             'position.required' => 'Номер параграфа обязателен для ввода',
             'text.required' => 'Текст параграфа обязателен для ввода',
         ];

         $paragraph = Paragraph::find($id);
         $position = (int) $request->get('position');
         $text = (string) $request->get('text');

         if ($paragraph->name !== $position) {
             $rules['position'][] = 'unique:paragraphs';
             $params[] = ['position.unique' => 'Параграф с таким номером уже есть в базе данных'];
         }
         $request->validate($rules, $params);
         $paragraph->position = $position;
         $paragraph->text = $text;
         $paragraph->updated_at = new DateTime();
         if (!$paragraph->save()) {
             throw new Exception();
         }
         return redirect()->route('paragraphs.list')->with('success', 'Параграф успешно обновлён');
     }
}
