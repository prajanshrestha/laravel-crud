<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

// create
Route::get('/addPost', [PostController::class, "addPost"])->name("post.create");
Route::post('/addPost', [PostController::class, "createPost"]);

// retrieve
Route::get('/posts', [PostController::class, "getPost"])->name("post.get");
Route::get('/posts/{id}', [PostController::class, "getPostById"]); 

// update
Route::get('/editPost/{id}', [PostController::class, "editPost"])->name("post.edit");
Route::post('/editPost/{id}', [PostController::class, "updatePost"]);

// delete
Route::get('/deletePost/{id}', [PostController::class, "deletePost"])->name("post.delete"); 