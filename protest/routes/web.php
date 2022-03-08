<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LogoutController;


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
    return view('home');
});

Route::get('home', function(){
    return view('home');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\PostsController::class, 'index'])-> name('dashboard');
Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create'])-> name('create') ;
Route::post('/post', [PostsController::class, 'store']);
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/logout', [LogoutController::class, 'store']) -> name('logout');

Route::post('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'store'])->name('post.likes');
Route::delete('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'destroy'])->name('post.likesdel');

Route::post('/post/{post}/dislikes', [App\Http\Controllers\DisLikeController::class, 'storing'])->name('post.dislikes');
Route::delete('/post/{post}/dislikes', [App\Http\Controllers\DisLikeController::class, 'destroying'])->name('post.dislikes');

Route::post('comment/{post}', [App\Http\Controllers\CommentController::class, 'stores'])->name('comment.store');


