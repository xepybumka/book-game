<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $tutorial = new Tutorial();
        $contentTitle = 'Добро пожаловать!';
        $contentText = '
            Перед вами Книга-Игра. Вернее, то чем это было в начале.
            Данный проект разрабатывался как "Пет-проект" с целью набить руку и сделать что-то "от" и "до".
            В данном приложении вы сможете пройти целое приключение по миру книги "Повелитель безбрежной пустыни" за авторством Дмитрия Браславского.
            Надеюсь, что вам понравится то приключение, что подготовили вам разработчик и писатель. Ну-с! Чего мы ждем?
            Для того чтобы начать игру, нажмите кнопку в верхнем левом углу и выберите "Новая игра".
        ';
        $tutorialTitle = 'Правила';
        $tutorialContent = $tutorial->getRules();
        $data = [
            'contentTitle' => $contentTitle,
            'contentText' => $contentText,
            'tutorialTitle' => $tutorialTitle,
            'tutorialContent' => $tutorialContent
        ];
        return view('main', $data);
    }

    public function newGame() {
        return view('main');
    }

    public function createCharacter() {
        return view('main');
    }

    public function tutorial() {
        return view('main');
    }

    public function addContent() {
        return view('main');
    }

    public function show(Request $request) {
        dd($request);
        return view('main');
    }
}
