<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController
{

    /**
     *
     * @return View
     */
    public function index() {
        return view('admin.index');
    }
}
