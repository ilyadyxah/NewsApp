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

    Route::get('/categories', [NewsController::class, 'categories'])
        ->name('news::categories');

    Route::get('/categories/{id}', [NewsController::class, 'category'])
        ->name('news::category');

    Route::get('/card/{id}', [NewsController::class, 'card'])
        ->name('news::card');
});

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin');

    Route::post('/create_news', [AdminController::class, 'createNews'])
        ->name('admin::news::create');

    Route::get('/add_news', [AdminController::class, 'addNews'])
        ->name('admin::news::add');

    Route::post('/create_category', [AdminController::class, 'createCategory'])
        ->name('admin::news::createCategory');

    Route::get('/add_category/{category?}', [AdminController::class, 'addCategory'])
        ->name('admin::news::addCategory');
});

Route::get('/admin/user/аuthor', [AuthorizationController::class, 'authorization'])
    ->name('admin::user::аuthor');
