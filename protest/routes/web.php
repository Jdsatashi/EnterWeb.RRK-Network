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

Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create'])-> name('create') ;
Route::post('/post', [PostsController::class, 'store']);
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/logout', [LogoutController::class, 'store']) -> name('logout');

