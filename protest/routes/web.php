<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\qacoorController;
use App\Http\Controllers\qamanagerController;
use App\Http\Controllers\staffController;

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

Route::middleware(['admin'])->group(function () {
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index']) -> name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);
    Route::delete('/register/{user}', [App\Http\Controllers\Auth\RegisterController::class, 'destroy'])->name(('user.delete'));
});

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/qamanager', [App\Http\Controllers\qamanagerController::class, 'index'])->name('qamanager')->middleware('qamanager');
Route::get('/qacoor', [App\Http\Controllers\qacoorController::class, 'index'])->name('qacoor')->middleware('qacoor');
Route::get('/staff', [App\Http\Controllers\staffController::class, 'index'])->name('staff')->middleware('staff');

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show')->middleware('auth');;
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/register/{user}', [App\Http\Controllers\Auth\RegisterController::class, 'edit'])->name('user.edit');
Route::put('/register/{user}', [App\Http\Controllers\Auth\RegisterController::class, 'update'])->name('user.update');

Route::get('/dashboard', [PostsController::class, 'index'])-> name('dashboard');
Route::middleware(['auth'])->group(function(){
    Route::get('/post/all', [PostsController::class, 'index2'])->name('post.list');
    Route::get('/post/create', [PostsController::class, 'create'])-> name('create') ;
    Route::post('/post', [PostsController::class, 'store'])->name('post');
    Route::get('/post/{post}', [PostsController::class, 'show'])->name('post.show');
    Route::get('/post/edit/{post}', [PostsController::class, 'edit'])->name('post.edit');
    Route::put('/post/update/{post}', [PostsController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{post}', [PostsController::class, 'destroy'])->name('post.delete');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/category/list', [App\Http\Controllers\CategoryController::class, 'index'])->name('cate.list');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('cate.create');
    Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::delete('/category/{category}/delete', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('cate.deleted');
    Route::get('/category/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('cate.edit');
    Route::put('/category/update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('cate.update');
});

Route::post('comment/{post}', [App\Http\Controllers\CommentController::class, 'stores'])->name('comment.store')->middleware('auth');

Route::get('/logout', [LogoutController::class, 'store']) -> name('logout')->middleware('auth');

Route::post('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'store'])->name('post.likes')->middleware('auth');
Route::delete('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'destroy'])->name('post.likesdel')->middleware('auth');

Route::post('/post/{post}/dislikes', [App\Http\Controllers\DisLikeController::class, 'storing'])->name('post.dislikes')->middleware('auth');
Route::delete('/post/{post}/dislikes', [App\Http\Controllers\DisLikeController::class, 'destroying'])->name('post.dislikes')->middleware('auth');

Route::get('/sendmail', [\App\Http\Controllers\MailController::class, 'sendEmail']);

Route::get('/close/show', [App\Http\Controllers\CloseController::class, 'index'])->name('close.show');
#Route::get('/close/create', [App\Http\Controllers\CloseController::class, 'create'])->name('close.create');
#Route::post('/close', [App\Http\Controllers\CloseController::class, 'store']);
#Route::delete('/close/{close}/delete', [App\Http\Controllers\CloseController::class, 'destroy'])->name('cate.deleted');
Route::get('/close/edit/{close}', [App\Http\Controllers\CloseController::class, 'edit'])->name('close.edit');
Route::put('/close/update/{close}', [App\Http\Controllers\CloseController::class, 'update'])->name('close.update');

