<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateForm;
use GuzzleHttp\Psr7\Request;

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
    return view('form',['error'=>'']);
});
Route::post('/' , function(){
    return;
})->middleware(ValidateForm::class);

Route::get('/noValidate/{error}',function(string $error){
    return view('form',['error'=>$error]);
});
Route::get('/ok/{name}/{family}/{age}',function($name,$family,$age){
    return view('ok',['name'=>$name,"family"=>$family,"age"=>$age]);
});
