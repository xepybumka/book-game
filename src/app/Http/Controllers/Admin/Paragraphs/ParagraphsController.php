<?php

namespace App\Http\Controllers\Admin\Paragraphs;

use App\Http\Controllers\Controller;
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
        $paragraphs = [];
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
        $paragraph = '';
        return view('admin.paragraphs.show',[
            'title' => $title,
            'paragraph' => $paragraph
        ]);
    }
}
