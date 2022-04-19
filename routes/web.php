<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/', function () {
    return redirect('/product');
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/', [ProductsController::class, 'index'])->name('index');
    Route::get('/create', [ProductsController::class, 'create'])->name('create');
    Route::post('/store', [ProductsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
    Route::get('/show/{id}', [ProductsController::class, 'show'])->name('show');
    Route::post('/update/{id}', [ProductsController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ProductsController::class, 'destroy'])->name('destroy');
});
