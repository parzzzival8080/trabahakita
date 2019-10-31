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
Route::post('/post/pdf', 'profilecontroller@pdf');
 

// Register
Route::get('/register', 'RegisterController@create');
Route::post('register','RegisterController@store');

// Login
Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

// Profile Employee
Route::get('/employee/profile', 'ProfileController@index');
Route::post('/employee/profile','profileController@store');
Route::post('/employee/profile/update','profileController@update');
Route::get('/employee/profile','profileController@showme');
Route::resource('/profile','profileController');


//Profile Company
Route::resource('/company/profile', 'CompanyController');

//Comment
Route::post('/post/comment', 'CommentsController@store');

// Educational Attainment and Skills and experience
Route::post('/profile/education', 'EducationController@store');
Route::post('/profile/education/update','EducationController@updateme');

Route::post('/profile/skill', 'SkillsController@store');
Route::post('/profile/skill/update', 'SkillsController@update');

Route::post('/profile/experience', 'ExperienceController@store');
Route::post('/profile/experience/update', 'ExperienceController@store');

//appointment
Route::Post('/setAppointment', 'AppointmentController@store');
Route::Post('/setAppointment/accept', 'AppointmentController@store');


//show pdf
Route::post('/post/pdf', 'profilecontroller@pdf');

// Notification
Route::get('/Notification', 'NotificationController@index');
Route::resource('/Notification/show', 'NotificationController');

//Sample getting nearest companies
Route::get('/maps', 'SampleController@index');






