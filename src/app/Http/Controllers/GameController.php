<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GameController extends Controller
{
    /**
     *
     * @return View
     */
    public function index() {
        return view('game.index');
    }
}
