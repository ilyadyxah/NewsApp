<?php

use App\Http\Controllers\AdminController;
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

    Route::get('/allnews', [NewsController::class, 'allNews'])
        ->name('news::allNews');

    Route::get('/categories', [NewsController::class, 'categories'])
        ->name('news::categories');

    Route::get('/categories/{id}', [NewsController::class, 'category'])
        ->name('news::category');

    Route::get('/card/{id}', [NewsController::class, 'card'])
        ->name('news::card');
});

Route::prefix('admin')->group(function() {

    Route::get('/', [AdminController::class, 'index'])
        ->name('admin::index');

    Route::get('/add_category/{category?}', [AdminController::class, 'addCategory'])
        ->name('admin::news::addCategory');

    Route::post('/create_category', [AdminController::class, 'createCategory'])
        ->name('admin::news::createCategory');

    Route::get('/add_news/{response?}', [AdminController::class, 'addNews'])
        ->name('admin::news::add');

    Route::post('/create_news', [AdminController::class, 'createNews'])
        ->name('admin::news::create');

    Route::get('/find_news/{response?}/{reply?}', [AdminController::class, 'findNews'])
        ->name('admin::news::findNews');

    Route::post('/get_news', [AdminController::class, 'getNews'])
        ->name('admin::news::getNews');

    Route::get('/delete_news/{news_id}', [AdminController::class, 'deleteNews'])
        ->name('admin::news::delete');

    Route::get('/update_news/{news_id}', [AdminController::class, 'updateNews'])
        ->name('admin::news::update');

    Route::post('/update_news/apply_update', [AdminController::class, 'applyUpdateNews'])
        ->name('admin::news::apply');

});

Route::get('/admin/user/аuthor', [AuthorizationController::class, 'authorization'])
    ->name('admin::user::аuthor');
