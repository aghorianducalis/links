<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PageController;
use App\Services\BookmarkParserService;
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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/category-tree', [PageController::class, 'categoryTree'])->name('categories');

Route::namespace('links')
    /*->middleware('')*/
    ->name('links')
    ->prefix('links')
    ->as('links.')
    ->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('index');
        Route::get('/parse-bookmarks', function (BookmarkParserService $parserService) {
            return 123;

        })->name('parse-bookmarks');

        Route::post('/', [LinkController::class, 'store'])->name('store');
//        Route::get('/{id}', [LinkController::class, 'show'])->name('show');
    });

Route::namespace('categories')
    /*->middleware('')*/
    ->name('categories')
    ->prefix('categories')
    ->as('categories.')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
//        Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });
