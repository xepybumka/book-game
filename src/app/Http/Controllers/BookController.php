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
        return view('index');
    }

    /**
     *
     * @return View
     */
    public function book() {
        return view('book');
    }
}
