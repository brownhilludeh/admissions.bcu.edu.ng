<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::prefix('profile/')->group(function () {
        //Profile Controller
        Route::get('my_profile', [App\Http\Controllers\ProfileController::class, 'myProfile'])->name('profile');
        Route::post('password/update', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('updatePassword');
    });
    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        // Academic Year
        Route::resource('academic_years', App\Http\Controllers\AcademicYearController::class);
        // Settings
        // Route::get('change_session/{session_id}', [App\Http\Controllers\SettingController::class, 'change_session']);
        Route::get('general_settings', [App\Http\Controllers\SettingController::class, 'settings'])->name('general_settings');
        Route::post('general_settings', [\App\Http\Controllers\SettingController::class, 'general_settings'])->name('general_settings');
        Route::post('setting/upload/logo', [\App\Http\Controllers\SettingController::class, 'logo'])->name('upload_logo');
        // Route::post('setting/upload/stamp', [\App\Http\Controllers\SettingController::class, 'stamp'])->name('upload_stamp');
        Route::get('backup_database', [\App\Http\Controllers\SettingController::class, 'backup_database'])->name('db.backup');
        // College
        Route::resource('colleges', App\Http\Controllers\CollegeController::class);
        // Programmers
        Route::get('programmes/college/{college_id}', [App\Http\Controllers\ProgrammeController::class, 'index']);
        Route::resource('programmes', App\Http\Controllers\ProgrammeController::class);
        // Users and Team
        Route::get('admission_teams', 'UserController@admissionTeam')->name('admissionTeam');
        Route::get('users/get_users/{user_type?}', [App\Http\Controllers\UserController::class, 'index']);
        Route::resource('users', App\Http\Controllers\UserController::class);
    });

    // Student Protected
    Route::middleware(['applicant'])->group(function () {
        Route::resource('applicant_registrations', \App\Http\Controllers\ApplicantController::class);
    });
});
