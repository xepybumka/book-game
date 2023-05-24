<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ParagraphController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
Route::get('/book', [BookController::class, 'book']);
Route::get('/rules', [BookController::class, 'rules']);

// Административная панель
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::controller(ParagraphController::class)->group(function () {
        Route::get('/paragraph/', 'index')->name('paragraph.list');

        Route::get('/paragraph/create', 'create')->name('paragraph.create');
        Route::post('/paragraph/create', 'store')->name('paragraph.store');

        Route::get('/paragraph/{id}', 'show')->name('paragraph.show');
        Route::get('/paragraph/{id}/edit', 'edit')->name('paragraph.edit');
        Route::put('/paragraph/{id}', 'update')->name('paragraph.update');
        Route::patch('/paragraph/{id}', 'update')->name('paragraph.update');
        Route::delete('/paragraph/{id}', 'destroy')->name('paragraph.destroy');
    });
});

