<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     *
     * @return View
     */
    public function index() {
        return view('core.index');
    }
}
