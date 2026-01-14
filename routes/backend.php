<?php

use App\Http\Controllers\Backend\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('users');
        Route::get('users/create', 'create')->name('users.create');
        Route::post('users', 'store')->name('users.store');
        Route::put('users/{id}', 'update')->name('users.update');
        Route::delete('users/{id}', 'delete')->name('users.delete');
    });

});
