<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', HomeController::class);

// Route::resource('/', \App\Http\Controllers\HomeController::class);

Route::resource('/posts', PostController::class);
Route::resource('/comments', CommentController::class)->except('create');
Route::get('comments/create/{id}', [CommentController::class, 'create'])->name('comments.create');

Route::get('/mahasiswa/{npm}', [MahasiswaController::class, 'index']);

Route::resource('/book', BookController::class);

Route::resource('/author', AuthorController::class);