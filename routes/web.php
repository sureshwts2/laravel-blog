<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/post/store',[PostController::class,'store'])->name('post.store');
Route::get('/post/show/{postId}',[PostController::class,'show'])->name('post.show');
Route::get('/post/all',[HomeController::class,'allPosts'])->name('post.all');
Route::get('/post/{postId}/edit',[PostController::class,'edit'])->name('post.edit');
Route::post('/post/{postId}/update',[PostController::class,'update'])->name('post.update');
Route::get('/post/{postId}/delete',[PostController::class,'delete'])->name('post.delete');
