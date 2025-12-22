<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Paragraph;
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
    public function book($paragraphNumber = null)
    {
        $paragraph = Paragraph::where('id', $paragraphNumber ?? 1)->first();
        return view('core.book.index', [
            'paragraph' => $paragraph
        ]);
    }

    /**
     * @return View
     */
    public function tutorial()
    {
        $paragraph = Paragraph::where('id', 1000)->first();
        return view('core.tutorial.index', [
            'paragraph' => $paragraph
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function paragraph($id)
    {
        $paragraph = Paragraph::find($id);
        return response()->json([
            'paragraph'     => $paragraph,
            'paragraph_type' => $paragraph->type->name,
            'transitions'   => $paragraph->transitions
        ]);
    }
}
