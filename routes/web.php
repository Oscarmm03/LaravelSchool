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

    //Rutas TEACHER
    Route::get('/teacher-users', [TeacherUserController::class, 'index'])->name('teacher.users');
    Route::get('/teacher-games', [TeacherGameController::class, 'index'])->name('teacher.games');
    Route::get('/teacher-results', [TeacherResultsController::class, 'index'])->name('teacher.results');
    Route::get('/teacher-settings', [TeacherSettingsController::class, 'index'])->name('teacher.settings');

    //Rutas STUDENT
    Route::get('/student-games', [StudentGameController::class, 'index'])->name('student.games');
    Route::get('/student-results', [StudentResultsController::class, 'index'])->name('student.results');
    Route::get('/student-settings', [StudentSettingsController::class, 'index'])->name('student.settings');
});
