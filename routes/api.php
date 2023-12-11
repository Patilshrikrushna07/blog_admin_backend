<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/create-new-blog','App\Http\Controllers\BlogsController@createblog');
Route::post('/add-new-categories','App\Http\Controllers\CategoriesController@createCategories');
Route::get('/getAll-categories','App\Http\Controllers\CategoriesController@fetchAllCategories');

