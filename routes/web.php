<?php

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

Route::get('/', [App\Http\Controllers\IndexPageController::class, 'index']);

Route::get('/search', [App\Http\Controllers\IndexPageController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/like/{id}/{count}', [App\Http\Controllers\HomeController::class, 'like']);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);

Route::get('/createPost', [App\Http\Controllers\ManagePostController::class, 'RendercreatePost'])->name('createPost');

Route::post('/createPostStore', [App\Http\Controllers\ManagePostController::class, 'Store']);


