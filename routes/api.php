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

//Blogs
Route::post('/create-new-blog','App\Http\Controllers\BlogsController@createblog');
Route::get('/getAll-blogs','App\Http\Controllers\BlogsController@fetchAllBlogs');
Route::get('/fetchblog/{id}','App\Http\Controllers\BlogsController@show');
Route::delete('/delete-Blog/{id}','App\Http\Controllers\BlogsController@destroy');
Route::post('/update-blog/{id}','App\Http\Controllers\BlogsController@update');

//categories
Route::post('/add-new-categories','App\Http\Controllers\CategoriesController@createCategories');
Route::get('/getAll-categories','App\Http\Controllers\CategoriesController@fetchAllCategories');
Route::get('/fetchCategory/{id}','App\Http\Controllers\CategoriesController@show');
Route::delete('/delete-Category/{id}','App\Http\Controllers\CategoriesController@destroy');
Route::post('/update-Category/{id}','App\Http\Controllers\CategoriesController@update');




