<?php

use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentGameController;
use App\Http\Controllers\StudentResultsController;
use App\Http\Controllers\StudentSettingsController;
use App\Http\Controllers\TeacherGameController;
use App\Http\Controllers\TeacherResultsController;
use App\Http\Controllers\TeacherSettingsController;
use App\Http\Controllers\TeacherUserController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminGameController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    // Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/dashboard', [LoginController::class, 'index'])->name('dashboard');

    //Rutas ADMIN
    Route::get('/admin-users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/admin-settings', [AdminSettingsController::class, 'index'])->name('admin.settings');
    Route::get('/admin-users-create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin-users-create', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin-users-edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin-users-edit/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin-users-delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin-courses', [AdminCourseController::class, 'index'])->name('admin.courses');
    Route::get('/admin-courses-create', [AdminCourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin-courses-create', [AdminCourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/admin-courses-edit/{id}', [AdminCourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/admin-courses-edit/{id}', [AdminCourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/admin-courses-delete/{id}', [AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');
    Route::get('/admin-games', [AdminGameController::class, 'index'])->name('admin.games');
    Route::get('/admin-games-create', [AdminGameController::class, 'create'])->name('admin.games.create');
    Route::post('/admin-games-create', [AdminGameController::class, 'store'])->name('admin.games.store');
    Route::get('/admin-games-edit/{id}', [AdminGameController::class, 'edit'])->name('admin.games.edit');
    Route::put('/admin-games-edit/{id}', [AdminGameController::class, 'update'])->name('admin.games.update');
    Route::delete('/admin-games-delete/{id}', [AdminGameController::class, 'destroy'])->name('admin.games.destroy');


    //Rutas TEACHER
    Route::get('/teacher-users', [TeacherUserController::class, 'index'])->name('teacher.users');
    Route::get('/teacher-users-edit/{id}', [TeacherUserController::class, 'edit'])->name('teacher.users.edit');
    Route::post('/teacher-users-edit/{id}', [TeacherUserController::class, 'assignCourse'])->name('teacher.users.assignCourse');
    Route::delete('/teacher-users-delete/{id}', [TeacherUserController::class, 'unassignCourse'])->name('teacher.users.unassignCourse');
    Route::get('/teacher-games', [TeacherGameController::class, 'index'])->name('teacher.games');
    Route::get('teacher-games-assign-user/{id}', [TeacherGameController::class, 'assignGameUser'])->name('teacher.games.assignUser');
    Route::post('teacher-games-assign-user/{id}', [TeacherGameController::class, 'storeGameUserAssign'])->name('teacher.games.storeGameUserAssign');
    Route::get('teacher-games-assign-course/{id}', [TeacherGameController::class, 'assignGameCourse'])->name('teacher.games.assignCourse');
    Route::post('teacher-games-assign-course/{id}', [TeacherGameController::class, 'storeGameCourseAssign'])->name('teacher.games.storeGameCourseAssign');
    Route::get('/teacher-results', [TeacherResultsController::class, 'index'])->name('teacher.results');
    Route::get('/teacher-settings', [TeacherSettingsController::class, 'index'])->name('teacher.settings');


    //Rutas STUDENT
    Route::get('/student-games', [StudentGameController::class, 'index'])->name('student.games');
    Route::get('/student-results', [StudentResultsController::class, 'index'])->name('student.results');
    Route::get('/student-settings', [StudentSettingsController::class, 'index'])->name('student.settings');
});
