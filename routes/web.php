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

Route::get('/','SiteController@index')->name('main');
Route::get('about','SiteController@about')->name('about');
Route::get('contact','SiteController@contact')->name('contact');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('courses', 'Website\CourseController');
Route::resource('posts', 'Website\PostController');
Route::get('courses_enroll/{course_id}','Website\CourseController@enroll')->name('course.enroll');

Route::group(['prefix' => 'dashboard','as'=>'dashboard.','middleware'=>'admin','namespace'=>'Dashboard'], function () {

Route::get('/', 'MainController@index')->name('home');
// user routes controllers
Route::resource('users', 'UserController');
Route::get('delete_user/{id}','UserController@destroy')->name('users.user_destroy');

// category routes controllers
Route::resource('categories', 'CategoryController');
Route::get('delete_category/{id}','CategoryController@destroy')->name('categories.category_destroy');

// courses routes controllers
Route::resource('courses', 'CourseController');
Route::get('delete_course/{id}','CourseController@destroy')->name('courses.course_destroy');

// lessons routes controllers
Route::resource('lessons', 'LessonController');
Route::get('delete_lesson/{id}','LessonController@destroy')->name('lessons.lesson_destroy');

// messages routes controllers
Route::resource('message', 'ContactController');
Route::get('delete_message/{id}','ContactController@destroy')->name('message.message_destroy');

});

