<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* ------------------------------------------------- *\
    Front
\* ------------------------------------------------- */

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@show');

Route::get('student', 'StudentController@show');
Route::get('student/{id}', 'StudentController@showStudent');

//Route::get('tag', 'TagController@show');
//Route::get('tag/{id}', 'TagController@showTag');


Route::get('post', 'FrontController@show');

// one post
Route::get('post/{id}', 'FrontController@showPost');

// posts by category
Route::get('category/{id}', 'FrontController@showPostByCategory');

/* ------------------------------------------------- *\
    REST Controller event
\* ------------------------------------------------- */

Route::resource('event', 'EventController');
Route::resource('tag', 'TagController');
Route::resource('comment', 'CommentController');

/* ------------------------------------------------- *\
    Auth
\* ------------------------------------------------- */

Route::controller('auth', 'Auth\AuthController');

/* ------------------------------------------------- *\
    Dashboard
\* ------------------------------------------------- */

Route::get('dashboard', 'Admin\DashboardController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('post', 'Admin\PostController');
});
