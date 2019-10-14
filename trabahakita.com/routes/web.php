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



Route::get('/', function () {
    return view('home');
});
// Post

Route::get('/post', 'PostController@index');
Route::get('/employee/dashboard', 'PostController@index');
Route::get('post/create', 'PostController@create');
Route::post('/post', 'PostController@store');
Route::resource('/post/show', 'PostController');
 

// Register
Route::get('/register', 'RegisterController@create');
Route::post('register','RegisterController@store');

// Login
Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

// Profile
Route::get('/employee/profile', 'ProfileController@index');
Route::post('/employee/profile','profileController@store');
Route::post('/employee/profile/update','profileController@update');
Route::get('/employee/profile','profileController@show');

//Comment
Route::post('/post/comment', 'CommentsController@store');



