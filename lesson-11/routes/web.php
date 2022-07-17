<?php

use App\Http\Controllers\GaleryController;
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

Route::get('/', [PostController::class ,"create"]);
Route::post('/', [PostController::class ,"store"]);
Route::get('/galery',[GaleryController::class,"getGalery"]);
