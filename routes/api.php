<?php

use Illuminate\Http\Request;
use App\Http\Resources\Book as BookResource;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('books', 'ApiBookController@index');
    Route::get('/book', function () {return new BookResource(Book::find(1));});
    Route::get('book/{id}', 'ApiBookController@view')->where('id', '[0-9]+');
    Route::resource('categories', 'ApiCategoryController');


    //public
    Route::get('categories', 'ApiCategoryController@index');
    Route::get('categories/random/{count}', 'ApiCategoryController@random');
    Route::get('books/top/{count}', 'ApiBookController@top');
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    //private
    Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'AuthController@logout');
       //...
    });


});
