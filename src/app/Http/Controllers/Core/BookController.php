<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     *
     * @return View
     */
    public function index() {
        return view('core.index');
    }

    /**
     *
     * @return View
     */
    public function book() {
        return view('core.book.index');
    }
}
