<?php

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

Route::get('/', ['as' => 'category.index', 'uses' => 'CategoryController@index']);

Route::resource('category', 'CategoryController', ['except' => ['index']]);

Route::resource('post', 'PostController', ['except' => ['index']]);

Route::post('comment', ['as' => 'comment.store', 'uses' => 'CommentController@store']);

Route::any('{all}', function(){
    abort(404);
})->where('all', '.*');