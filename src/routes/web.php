<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnemyController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\ParagraphController;
use App\Http\Controllers\Admin\TransitionController;
use App\Http\Controllers\Admin\WeaponController;
use App\Http\Controllers\Core\BookController;
use Illuminate\Support\Facades\Route;

// Основная часть
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

    Route::controller(ItemController::class)->group(function () {
        Route::get('/item/', 'index')->name('item.list');

        Route::get('/item/create', 'create')->name('item.create');
        Route::post('/item/create', 'store')->name('item.store');

        Route::get('/item/{id}', 'show')->name('item.show');
        Route::get('/item/{id}/edit', 'edit')->name('item.edit');
        Route::put('/item/{id}', 'update')->name('item.update');
        Route::patch('/item/{id}', 'update')->name('item.update');
        Route::delete('/item/{id}', 'destroy')->name('item.destroy');
    });

    Route::controller(EnemyController::class)->group(function () {
        Route::get('/enemy/', 'index')->name('enemy.list');

        Route::get('/enemy/create', 'create')->name('enemy.create');
        Route::post('/enemy/create', 'store')->name('enemy.store');

        Route::get('/enemy/{id}', 'show')->name('enemy.show');
        Route::get('/enemy/{id}/edit', 'edit')->name('enemy.edit');
        Route::put('/enemy/{id}', 'update')->name('enemy.update');
        Route::patch('/enemy/{id}', 'update')->name('enemy.update');
        Route::delete('/enemy/{id}', 'destroy')->name('enemy.destroy');
    });

    Route::controller(NoteController::class)->group(function () {
        Route::get('/note/', 'index')->name('note.list');

        Route::get('/note/create', 'create')->name('note.create');
        Route::post('/note/create', 'store')->name('note.store');

        Route::get('/note/{id}', 'show')->name('note.show');
        Route::get('/note/{id}/edit', 'edit')->name('note.edit');
        Route::put('/note/{id}', 'update')->name('note.update');
        Route::patch('/note/{id}', 'update')->name('note.update');
        Route::delete('/note/{id}', 'destroy')->name('note.destroy');
    });

    Route::controller(TransitionController::class)->group(function () {
        Route::get('/transition/', 'index')->name('transition.list');

        Route::get('/transition/create', 'create')->name('transition.create');
        Route::post('/transition/create', 'store')->name('transition.store');

        Route::get('/transition/{id}', 'show')->name('transition.show');
        Route::get('/transition/{id}/edit', 'edit')->name('transition.edit');
        Route::put('/transition/{id}', 'update')->name('transition.update');
        Route::patch('/transition/{id}', 'update')->name('transition.update');
        Route::delete('/transition/{id}', 'destroy')->name('transition.destroy');
    });

});

