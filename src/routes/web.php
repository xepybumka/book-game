<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnemyController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\ParagraphController;
use App\Http\Controllers\Admin\ParagraphItemController;
use App\Http\Controllers\Admin\ParagraphTransitionController;
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

    Route::controller(ParagraphTransitionController::class)->group(function () {
        Route::get('/paragraph_transition/', 'index')->name('paragraph_transition.list');

        Route::get('/paragraph_transition/create', 'create')->name('paragraph_transition.create');
        Route::post('/paragraph_transition/create', 'store')->name('paragraph_transition.store');

        Route::get('/paragraph_transition/{id}', 'show')->name('paragraph_transition.show');
        Route::get('/paragraph_transition/{id}/edit', 'edit')->name('paragraph_transition.edit');
        Route::put('/paragraph_transition/{id}', 'update')->name('paragraph_transition.update');
        Route::patch('/paragraph_transition/{id}', 'update')->name('paragraph_transition.update');
        Route::delete('/paragraph_transition/{id}', 'destroy')->name('paragraph_transition.destroy');
    });


    Route::controller(ParagraphItemController::class)->group(function () {
        Route::get('/paragraph_item/', 'index')->name('paragraph_item.list');

        Route::get('/paragraph_item/create', 'create')->name('paragraph_item.create');
        Route::post('/paragraph_item/create', 'store')->name('paragraph_item.store');

        Route::get('/paragraph_item/{id}', 'show')->name('paragraph_item.show');
        Route::get('/paragraph_item/{id}/edit', 'edit')->name('paragraph_item.edit');
        Route::put('/paragraph_item/{id}', 'update')->name('paragraph_item.update');
        Route::patch('/paragraph_item/{id}', 'update')->name('paragraph_item.update');
        Route::delete('/paragraph_item/{id}', 'destroy')->name('paragraph_item.destroy');
    });

});

