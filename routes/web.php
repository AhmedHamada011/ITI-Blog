<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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


Route::get('/',fn () => view("welcome"))->name("site.index");



// remove old posts
Route::get("/posts/removeOld",[PostController::class,"removePosts"]);


// post routes
Route::group(['middleware'=>['auth']],function(){

  // =============================================== start posts Resource ===============================================
  Route::get('/posts', [PostController::class,"index"])->name("posts.index");
  Route::get('/posts/create', [PostController::class,"create"])->name("posts.create");
  Route::post('/posts', [PostController::class,"store"])->name("posts.store");

  //restore
  Route::post('/posts/{post}/restore', [PostController::class,"restore"])->name("posts.restore");

  Route::get('/posts/{post}', [PostController::class,"show"])->name("posts.show");
//  Route::get('/api/posts/{post}', [PostController::class,"showApi"])->name("posts.showApi");

  Route::get('/posts/{post}/edit', [PostController::class,"edit"])->name("posts.edit");
  Route::put('/posts/{post}', [PostController::class,"update"])->name("posts.update");

  // soft delete
  Route::delete('/posts/{post}', [PostController::class,"destroy"])->name("posts.delete");


  // =============================================== end posts Resource ===============================================

  // =============================================== start users Resource ===============================================


  Route::get('/users/{user}/edit', [UserController::class,"edit"])->name("users.edit");
  Route::put('/users/{user}', [UserController::class,"update"])->name("users.update");

  // =============================================== end users Resource ===============================================


});
// comment routes
Route::post('/comments', [CommentController::class,"store"])->name("comments.store");


// auth routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// socialite
Route::get("/auth/{provider}/redirect",[SocialiteController::class,'redirect'])->name("auth.socilaite.redirect");
Route::get("/auth/{provider}/callback",[SocialiteController::class,'callback'])->name("auth.socilaite.callback");


Route::get("/auth/{provider}/info",[SocialiteController::class,'info'])->name("auth.socilaite.info");

