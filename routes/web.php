<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\ReceipeController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth',])->group(function () {
    Route::name('receipe.')->prefix('receipe')->group(function () {
        Route::get('/', [ReceipeController::class, 'index'])->name('index');
        Route::get('/create', [ReceipeController::class, 'create'])->name('create');
        Route::get('show/{id}', [ReceipeController::class, 'show'])->name('show');
        Route::get('print/{id}', [ReceipeController::class, 'print'])->name('print');
    });
});
