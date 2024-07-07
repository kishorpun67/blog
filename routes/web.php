<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;


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
Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::post('/check-mail', [UserController::class, 'checkEmail'])->name('check.mail');



Route::group([ 'middleware' => 'auth'],function() {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/verify', [UserController::class, 'verify'])->name('verify');

    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::match(['get', 'post'], '/add-post', [PostController::class, 'addPost'])->name('add.post');
    Route::match(['get', 'post'], '/edit-post/{id?}', [PostController::class, 'editPost'])->name('edit.post');
    Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('delete.post');

    Route::post('/like', [LikeController::class, 'like'])->name('like');
});