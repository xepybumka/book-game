<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     *
     * @return View
     */
    public function index() {
        return view('index');
    }
}
