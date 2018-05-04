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

Route::get('/', function(){
    return redirect('/collages');
});

//normal routes
Route::resource('collages', 'CollagesController');
Route::resource('academic-years', 'AcademicYearController');
Route::resource('courses', 'CourseController');
Route::resource('departments', 'DepartmentController');
Route::resource('doctors', 'DoctorController');
Route::resource('employees', 'EmployeeController');
Route::resource('books', 'BookController');
Route::resource('syllabuses', 'SyllabusController');
Route::resource('comments', 'CommentController');
Route::resource('documents', 'CollageDocumentController');
Route::resource('course-specifications', 'CourseSpecificationController');
Route::resource('knowledge-understandings', 'KnowledgeUnderstandingController');
Route::resource('intellectual-skills', 'IntellectualSkillController');
Route::resource('professional-skills', 'ProfessionalSkillController');
Route::resource('general-skills', 'GeneralSkillController');
Route::resource('course-matrices', 'CourseMatrixController');
Route::resource('learning-methods', 'LearningMethodController');
Route::resource('assessment-methods', 'AssessmentMethodController');

//pivot tables routes
Route::resource('course-to-knowledge', 'CourseToKnowledgeController');
Route::resource('course-to-intellectuals', 'CourseToIntellectualController');
Route::resource('course-to-professionals', 'CourseToProfessionalController');
Route::resource('course-to-generals', 'CourseToGeneralController');

Auth::routes();
