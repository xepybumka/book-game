<?php

namespace App\Http\Controllers\Core;

use App\Enums\TableNameEnum;
use App\Http\Controllers\Controller;
use App\Models\Paragraph;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     *
     * @return View
     */
    public function index()
    {
        return view('core.index');
    }

    /**
     *
     * @return View
     */
    public function book()
    {
        return view('core.book.index');
    }

    /**
     * @deprecated
     *
     * @return View
     */
    public function test()
    {
        $paragraph = Paragraph::where('id', 2)->first();
        return view('core.test.index', [
            'paragraph' => $paragraph
        ]);
    }
}
