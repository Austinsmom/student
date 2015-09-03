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

Route::get('/', 'HomeController@show');

Route::get('student', 'StudentController@show');
Route::get('student/{id}', 'StudentController@showStudent');

Route::get('tag', 'TagController@show');
Route::get('tag/{id}', 'TagController@showTag');


/* ------------------------------------------------- *\
    routes post controller
\* ------------------------------------------------- */

Route::get('post', 'PostController@show');

// afficher un post en particulier
Route::get('post/{id}', 'PostController@showPost');

// main menu pour afficher les articles d'une catégorie
Route::get('category/{id}', 'PostController@showPostByCategory');

Route::get('test', function () {
    return Category::find(2)->posts;
});