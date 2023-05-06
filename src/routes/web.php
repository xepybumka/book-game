<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Основные роуты для пользователей
Route::get('/', [BookController::class, 'index']);
Route::get('/book', [BookController::class, 'book']);
Route::get('/rules', [BookController::class, 'rules']);

// Роуты для администрации игры
Route::get('/admin', [AdminController::class, 'index']);

