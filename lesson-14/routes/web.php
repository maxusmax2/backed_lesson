<?php

use App\Http\Controllers\PostController;
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

Route::get('/posts',[PostController::class,"getAllPosts"]);
Route::get('/post/{id}',[PostController::class,"getPost"]);
Route::get('/createPost',[PostController::class,"getForm"]);
Route::get('/recentPosts',[PostController::class,"getRecentPosts"]);
Route::get('Post/{name}',[PostController::class,"getPost"]);
Route::post('/createPost',[PostController::class,"createPost"]);
Route::post('/createComment',[PostController::class,"createComment"]);
Route::get('post/{id}/author',[PostController::class,"getAuthorComment"]);
