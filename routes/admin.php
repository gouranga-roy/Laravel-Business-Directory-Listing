<?php
use App\Http\Controllers\Backend\Admin\AmenitiesController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\TypeController;
use App\Http\Controllers\Backend\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {

    // User Controller
    Route::controller(UserController::class)->group(function () {

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
        Route::get('categories/{slug?}', 'index')->name('category');
        Route::post('categories/store', 'store')->name('category.store');
        Route::put('categories/{slug}/update', 'update')->name('category.update');
        Route::delete('categories/{slug}/delete', 'delete')->name('category.delete');

        Route::post('categories/subcategory/store', 'subCategoryStore')->name('category.subStore');
        Route::put('categories/{slug}/sub-update', 'subCategoryUpdate')->name('category.subUpdate');
        Route::delete('categories/{slug}/sub-delete', 'subCategoryDelete')->name('category.subDelete');
    });

    // Amenities Controller
    Route::controller(AmenitiesController::class)->group(function () {
        Route::get('amenities/{slug?}', 'index')->name('amenities');
        Route::post('amenities/store', 'store')->name('amenities.store');
        Route::put('amenities/{slug}/update', 'update')->name('amenities.update');
        Route::delete('amenities/{slug}/delete', 'delete')->name('amenities.delete');

        Route::get('list-amenities/{slug?}', 'listAmenities')->name('listAmenities');
        Route::post('list-amenities/store', 'listAmenitiesStore')->name('listAmenities.store');
    });

});
