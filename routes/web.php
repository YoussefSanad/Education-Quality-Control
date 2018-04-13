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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::resource('collages', 'CollagesController');
Route::resource('academic-years', 'AcademicYearController');
Route::resource('courses', 'CourseController');
Route::resource('departments', 'DepartmentController');
Route::resource('doctors', 'DoctorController');
Route::resource('employees', 'EmployeeController');
Route::resource('books', 'BookController');
Route::resource('syllabuses', 'SyllabusController');
Route::resource('comments', 'CommentController');


Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
