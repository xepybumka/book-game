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

        Route::get('/paragraphs/create', 'create')->name('paragraphs.create');
        Route::post('/paragraphs/create', 'store')->name('paragraphs.store');

        Route::get('/paragraphs/{id}', 'show')->name('paragraphs.show');
        Route::get('/paragraphs/{id}/edit', 'edit')->name('paragraphs.edit');
        Route::put('/paragraphs/{id}', 'update')->name('paragraphs.update');
        Route::patch('/paragraphs/{id}', 'update')->name('paragraphs.update');
        Route::delete('/paragraphs/{id}', 'destroy')->name('paragraphs.destroy');

    });
});

