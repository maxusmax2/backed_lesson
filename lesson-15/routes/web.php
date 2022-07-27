<?php

use App\Http\Controllers\WorkerController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/part1',[WorkerController::class,'part1']);
Route::get('/part2',[WorkerController::class,'part2']);
Route::get('/part3',[WorkerController::class,'part3']);
Route::get('/part4',[WorkerController::class,'part4']);
Route::get('/part5',[WorkerController::class,'part5']);
