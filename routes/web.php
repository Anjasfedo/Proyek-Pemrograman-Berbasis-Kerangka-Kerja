<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/mahasiswa/{npm}', [MahasiswaController::class, 'index']);

Route::resource('/book', BookController::class);

Route::resource('/author', AuthorController::class);