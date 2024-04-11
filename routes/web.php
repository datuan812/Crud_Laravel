<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
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
    return view('web');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('/class', ClassController::class);

    Route::get('/classes/search', [ClassController::class, 'search'])->name('class.search');

    Route::resource('/course', CourseController::class);

    Route::get('/courses/search', [CourseController::class, 'search'])->name('course.search');

    Route::resource('/student', StudentController::class);

    Route::get('/students/search', [StudentController::class, 'search'])->name('student.search');

    Route::get('change-password', [AuthController::class, 'showChangePasswordForm'])->name('changePassword');

    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.update');
});


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::post('register', [AuthController::class, 'register']);



