<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BookController extends Controller
{
    /**
     *
     * @return View
     */
    public function index() {
        return view('book.index');
    }
}
