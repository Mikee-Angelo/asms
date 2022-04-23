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

Route::resource('enroll', \App\Http\Controllers\EnrollController::class)->only(['index']);
Route::resource('application', \App\Http\Controllers\ApplicationController::class)->only(['store']);

Route::middleware(['auth'])->group(function() { 
    Route::get('/dashboard', [ \App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard'); 
    Route::resource('students', \App\Http\Controllers\StudentController::class)->only(['index', 'show']);
    Route::resource('courses', \App\Http\Controllers\CourseController::class)->only(['index', 'show', 'create', 'store']);
    Route::resource('courses.subjects', \App\Http\Controllers\CourseSubjectController::class);

    Route::post('/subjects/search', [\App\Http\Controllers\SubjectController::class, 'search'])->name('subjects.search');

    //Subjects
    Route::resource('subjects', \App\Http\Controllers\SubjectController::class)->only(['index', 'show', 'create', 'store', 'destroy']);

    //Grades
    Route::resource('subject.student.grades', \App\Http\Controllers\GradeController::class);
    
    //Application
    Route::put('application/accept', [ \App\Http\Controllers\ApplicationController::class, 'accept']);
    Route::resource('application', \App\Http\Controllers\ApplicationController::class)->only(['index', 'show']);

    //Application Payment
    Route::resource('application.payment', \App\Http\Controllers\ApplicationTransactionController::class);

    Route::resource('pricings', \App\Http\Controllers\PricingController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('roles', \App\Http\Controllers\SuperAdmin\ManageController::class);

    //Mail
    Route::resource('mail', \App\Http\Controllers\MailController::class);

    //Faculty
    Route::resource('faculty', \App\Http\Controllers\FacultyController::class);

    //Course Dean
    Route::resource('courses.dean', \App\Http\Controllers\CourseDeanController::class);
    
    //Course Dean
    Route::resource('courses.instructor', \App\Http\Controllers\CourseInstructorController::class);

    //Schedule
    Route::post('schedule/submit', [\App\Http\Controllers\ScheduleController::class, 'submit'])->name('schedule.submit');
    Route::resource('schedule', \App\Http\Controllers\ScheduleController::class);

    //Miscellaneous
    Route::resource('miscellaneous', \App\Http\Controllers\MiscellaneousController::class);

    //Others
    Route::resource('other', \App\Http\Controllers\OtherController::class);

    //Registration Fee
    Route::resource('registration-fee',\App\Http\Controllers\RegistrationFeeController::class);

    //Discount
    Route::resource('discount', \App\Http\Controllers\DiscountController::class);

    //Schedule Course Subject
    Route::resource('schedule.course.subject', \App\Http\Controllers\ScheduleCourseSubjectController::class);

    //Course Subject Room
    Route::resource('course.subject.room', \App\Http\Controllers\ScheduleRoomController::class);

    //Curriculum
    Route::resource('curriculum', \App\Http\Controllers\CurriculumController::class);

    //School Year
    Route::resource('school-year', \App\Http\Controllers\SchoolYearController::class);

    //Enrollment
    Route::resource('school-year.enrollment', \App\Http\Controllers\EnrollmentController::class);

    //Building
    Route::resource('building', \App\Http\Controllers\BuildingController::class);

    //Rooms
    Route::resource('building.rooms', \App\Http\Controllers\RoomController::class);


});

require __DIR__.'/auth.php';
