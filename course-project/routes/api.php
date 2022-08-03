<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CompareController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/favorite',[FavoriteController::class , 'getFavorite']);
Route::get('/compare',[CompareController::class,'getCompare']);

Route::get('/catalog/sale-{buildType}/{id}',[DetailController::class,'getDetail']);
Route::group([],function(){

    Route::post('/catalog/sale-{buildType}/{id}/append-favorite',[FavoriteController::class,'appendFavorite']);
    Route::post('/catalog/sale-{buildType}/{id}/delete-favorite',[FavoriteController::class,'deleteFavorite']);

    Route::post('/catalog/sale-{buildType}/{id}/append-compare',[CompareController::class,'appendCompare']);
    Route::post('/catalog/sale-{buildType}/{id}/delete-compare',[CompareController::class,'deleteCompare']);
});
