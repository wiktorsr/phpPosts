<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/posts', [PostController::class, 'index'])->name('admin_posts_index')->middleware('auth');
Route::get('admin/posts/create', [PostController::class, 'create'])->name('admin_posts_create')->middleware('auth');
Route::post('admin/posts', [PostController::class, 'store'])->name('admin_posts_store')->middleware('auth');
Route::get('admin/posts/{post}', [PostController::class, 'destroy'])->name('admin_posts_delete')->middleware('auth');
Route::get('admin/posts/edit/{post}', [PostController::class, 'edit'])->name('admin_posts_edit')->middleware('auth');




