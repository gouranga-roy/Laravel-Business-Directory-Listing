<?php
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\TypeController;
use App\Http\Controllers\Backend\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {

    // User Controller
    Route::controller(UserController::class)->group(function () {
        Route::get('classes', 'index')->name('classes');
        Route::post('classes', 'store')->name('classes.store');
        Route::put('classes/{id}', 'update')->name('classes.update');
        Route::delete('classes/{id}', 'delete')->name('classes.delete');
    });

    // Type Controller
    Route::controller(TypeController::class)->group(function () {
        Route::get('type', 'index')->name('type');
        Route::post('type/store', 'store')->name('type.store');
        Route::put('type/{slug}/update', 'update')->name('type.update');
        Route::delete('type/{slug}/delete', 'delete')->name('type.delete');
    });

    // Category Controller
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'category')->name('category');
    });

});
