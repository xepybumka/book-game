<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () {
    $menuPoints = [
        'Главная',
        'Правила'
    ];
    $parameters = [
        'Ловкость',
        'Сила',
        'Сила мысли',
        'Деньги',
        'Еда',
    ];
    $testValues = [5, 12, 4, 6, 3];
    $content = 'Hello World. Start page.';
    return view('main',
                [
                    'content' => $content,
                    'menuPoints' => $menuPoints,
                    'parameters' => $parameters,
                    'testValues' => $testValues
                ]
    );
});

$router->get('/page/{$pageId}', function ($pageId) {
    return 'Hello World. Page number #'.$pageId;
});
