<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$router->get('/', 'MainController@index'); // Start page

$router->get('/new_game', 'MainController@newGame'); // New Game page
$router->get('/create_character', 'MainController@createCharacter'); // Creating character page
$router->get('/tutorial', 'MainController@tutorial'); // Full tutorial page
$router->get('/add_content', 'MainController@addContent'); // Admin add page/content page to the databases

$router->post('/page/{pageId}', 'MainController@show');
