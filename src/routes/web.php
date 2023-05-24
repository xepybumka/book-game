<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ParagraphController;
use App\Http\Controllers\Admin\WeaponController;
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

    Route::controller(WeaponController::class)->group(function () {
        Route::get('/weapon/', 'index')->name('weapon.list');

        Route::get('/weapon/create', 'create')->name('weapon.create');
        Route::post('/weapon/create', 'store')->name('weapon.store');

        Route::get('/weapon/{id}', 'show')->name('weapon.show');
        Route::get('/weapon/{id}/edit', 'edit')->name('weapon.edit');
        Route::put('/weapon/{id}', 'update')->name('weapon.update');
        Route::patch('/weapon/{id}', 'update')->name('weapon.update');
        Route::delete('/weapon/{id}', 'destroy')->name('weapon.destroy');
    });
});

