<?php

use App\Http\Controllers\LinkController;
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

Route::get('/', [LinkController::class, 'home'])->name('home');

Route::namespace('links')
    /*->middleware('')*/
    ->name('links')
    ->prefix('links')
    ->as('links.')
    ->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('index');
        Route::post('/', [LinkController::class, 'store'])->name('store');
//        Route::get('/{id}', [LinkController::class, 'show'])->name('show');
    });
