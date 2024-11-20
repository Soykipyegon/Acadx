<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//Route::get('/dashboard', function () {
    //$totalStudents = Student::count();  // Get total students
    
    //return view('dashboard', compact('totalStudents'));
//});

Auth::routes();

Route::resource('students', App\Http\Controllers\StudentController::class);
Route::resource('courses', App\Http\Controllers\CourseController::class);
Route::resource('levels', App\Http\Controllers\LevelController::class);
Route::resource('departments', App\Http\Controllers\DepartmentController::class);
Route::resource('schools', App\Http\Controllers\SchoolController::class);
Route::resource('employees', App\Http\Controllers\EmployeeController::class);
Route::resource('fees', App\Http\Controllers\FeeController::class);
Route::resource('units', App\Http\Controllers\UnitController::class);
Route::resource('invoices', App\Http\Controllers\InvoiceController::class);
Route::resource('receipts', App\Http\Controllers\ReceiptController::class);
Route::resource('lecturers', App\Http\Controllers\LecturerController::class);
Route::resource('enrolments', App\Http\Controllers\EnrolmentController::class);
Route::resource('grades', App\Http\Controllers\GradeController::class);
Route::resource('exams', App\Http\Controllers\ExamController::class);
Route::resource('courseworks', App\Http\Controllers\CourseworkController::class);
Route::resource('lessons', App\Http\Controllers\LessonController::class);
Route::resource('attendances', App\Http\Controllers\AttendanceController::class);