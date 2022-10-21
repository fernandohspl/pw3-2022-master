<?php

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

Route::get('/hello-world/{nome}', [\App\Http\Controllers\TesteController::class, 'mostrarNome']);
Route::get('/soma/{n1}/{n2}', [\App\Http\Controllers\TesteController::class, 'soma']);

Route::resource('categorias', \App\Http\Controllers\CategoriaController::class)->middleware(['auth', 'verified']);
Route::resource('subcategorias', \App\Http\Controllers\SubcategoriaController::class)->middleware(['auth', 'verified']);
Route::resource('produtos', \App\Http\Controllers\ProdutoController::class)->middleware(['auth', 'verified']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
