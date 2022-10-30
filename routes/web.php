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
$router->get('/', 'BookController@index'); // Start page

$router->get('/new_game', 'BookController@newGame'); // New Book page
$router->get('/create_character', 'BookController@createCharacter'); // Creating character page
$router->get('/tutorial', 'BookController@tutorial'); // Full tutorial page
$router->post('/page/{pageId}', 'BookController@show');

$router->get('/add_content', 'AdminController@addContent'); // Admin add page/content page to the databases
