<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Paragraphs\ParagraphsController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
Route::get('/book', [BookController::class, 'book']);
Route::get('/rules', [BookController::class, 'rules']);

// Административная панель
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::controller(ParagraphsController::class)->group(function () {
        Route::get('/paragraphs/', 'index')->name('paragraphs.list');
        Route::get('/paragraphs/{id}', 'show')->name('paragraphs.show');
        Route::get('/paragraphs/{id}/edit', 'edit')->name('paragraphs.edit');
        Route::get('/paragraphs/create', 'create')->name('paragraphs.create');
        Route::get('/paragraphs/{id}/delete', 'delete')->name('paragraphs.delete');

        Route::post('/paragraphs/{id}/edit', 'edit')->name('paragraphs.edit');
        Route::post('/paragraphs/add', 'add')->name('paragraphs.add');
        Route::post('/paragraphs/{id}/delete', 'delete')->name('paragraphs.delete');

    });
});

