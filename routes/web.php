<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('news')->group(function() {

    Route::get('/', [NewsController::class, 'index'])
        ->name('news::index');

    Route::get('/categories', [NewsController::class, 'categories'])
        ->name('news::categories');

    Route::get('/categories/{id}', [NewsController::class, 'category'])
        ->name('news::category');

    Route::get('/card/{id}', [NewsController::class, 'card'])
        ->name('news::card');
});

Route::prefix('admin/news/')->group(function() {

    Route::get('index', [AdminNewsController::class, 'index'])
        ->name('admin::news::index');

    Route::get('create', [AdminNewsController::class, 'create'])
        ->name('admin::news::create');

    Route::post('save', [AdminNewsController::class, 'save'])
        ->name('admin::news::save');

    Route::get('update/{news}', [AdminNewsController::class, 'update'])
        ->name('admin::news::update');

    Route::get('delete/{id}', [AdminNewsController::class, 'delete'])
        ->name('admin::news::delete');

    Route::match(['get', 'post'], '/find/', [AdminNewsController::class, 'find'])
        ->name('admin::news::find');


    Route::prefix('admin/category/')->group(function() {
        Route::get('create', [CategoryController::class, 'create'])
            ->name('admin::category::create');

        Route::get('update/{id}', [CategoryController::class, 'update'])
            ->name('admin::category::update');

        Route::get('delete/{id}', [CategoryController::class, 'delete'])
            ->name('admin::category::delete');

        Route::post('save', [CategoryController::class, 'save'])
            ->name('admin::category::save');
    });

//    Route::get('/lang/{lang}', [NewsController::class, 'setLocale'])
//        ->name('lang');

    Route::get('/locale/{lang}', function ($locale) {
        if (! in_array($locale, ['en', 'ru'])) {
            abort(400);
        }

        App::setLocale($locale);
        return back();
        //
    })->name('lang');

});

//Route::get('/admin/user/аuthor', [AuthorizationController::class, 'authorization'])
//    ->name('admin::user::аuthor');
