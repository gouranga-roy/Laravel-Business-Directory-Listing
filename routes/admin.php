<?php
use App\Http\Controllers\Backend\Admin\AmenitiesController;
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
        Route::get('type', 'index')->name('type.index');
        Route::post('type/store', 'store')->name('type.store');
        Route::put('type/{slug}/update', 'update')->name('type.update');
        Route::delete('type/{slug}/delete', 'delete')->name('type.delete');
    });

    // Category Controller
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories/{slug?}', 'index')->name('category.index');
        Route::post('categories/store', 'store')->name('category.store');
        Route::put('categories/{slug}/update', 'update')->name('category.update');
        Route::delete('categories/{slug}/delete', 'delete')->name('category.delete');

        Route::post('categories/subcategory/store', 'subCategoryStore')->name('category.subStore');
        Route::put('categories/{slug}/sub-update', 'subCategoryUpdate')->name('category.subUpdate');
        Route::delete('categories/{slug}/sub-delete', 'subCategoryDelete')->name('category.subDelete');
    });

    // Amenities Controller
    Route::controller(AmenitiesController::class)->group(function () {
        Route::get('amenities', 'index')->name('amenities.index');
    });

});
