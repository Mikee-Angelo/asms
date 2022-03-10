<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/enroll', [ \App\Http\Controllers\EnrollController::class, 'index'])->name('enroll');

Route::middleware(['auth'])->group(function() { 
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('students', \App\Http\Controllers\StudentController::class)->only(['index', 'show']);
    Route::resource('courses', \App\Http\Controllers\CourseController::class)->only(['index', 'show', 'create', 'store']);
    Route::resource('courses.subjects', \App\Http\Controllers\CourseSubjectController::class, ['parameters' => 'id'])->only(['index', 'show', 'create', 'store']);
    Route::resource('subjects', \App\Http\Controllers\SubjectController::class)->only(['index', 'show', 'create', 'store']);

    Route::prefix('/manage')->group(function() { 
        Route::get('/', [\App\Http\Controllers\SuperAdmin\ManageController::class, 'index'])->name('manage'); 
    });
});

require __DIR__.'/auth.php';
