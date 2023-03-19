<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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


// post routes
Route::get('/', [PostController::class,"index"])->name("posts.index");
Route::get('/posts/create', [PostController::class,"create"])->name("posts.create");
Route::post('/posts', [PostController::class,"store"])->name("posts.store");
Route::post('/posts/{post}/restore', [PostController::class,"restore"])->name("posts.restore");

Route::get('/posts/{post}', [PostController::class,"show"])->name("posts.show");
Route::get('/posts/{post}/edit', [PostController::class,"edit"])->name("posts.edit");
Route::put('/posts/{post}', [PostController::class,"update"])->name("posts.update");
Route::delete('/posts/{post}', [PostController::class,"destroy"])->name("posts.delete");

// comment routes

Route::post('/comments', [CommentController::class,"store"])->name("comments.store");
