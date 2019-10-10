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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/students', 'StudentController@index')->name('students');

Route::get('/home', 'HomeController@welcome')->name('welcome');

Route::get('/teachers', 'TeacherController@index')->name('teachers');

Route::get('/classes', 'ClassesController@index')->name('classes');

Route::get('/cities', 'CitiesController@index')->name('cities');



Route::post('/class/edit', 'ClassesController@update')->name('class/edit');

Route::post('/student/edit', 'StudentController@update')->name('student/edit');

Route::post('/teacher/edit', 'TeacherController@update')->name('teacher/edit');



Route::get('/class/create', 'ClassesController@create')->name('class/create');

Route::get('/student/create', 'StudentController@create')->name('student/create');

Route::get('/teacher/create', 'TeacherController@create')->name('teacher/create');

Route::post('/class/insert', 'ClassesController@store')->name('class/insert');

Route::post('/student/insert', 'StudentController@store')->name('student/insert');

Route::post('/teacher/insert', 'TeacherController@store')->name('teacher/insert');



Route::get('/class/delete/{id}', 'ClassesController@destroy')->name('class/delete');

Route::get('/student/delete/{id}', 'StudentController@destroy')->name('student/delete');

Route::get('/teacher/delete/{id}', 'TeacherController@destroy')->name('teacher/delete');
