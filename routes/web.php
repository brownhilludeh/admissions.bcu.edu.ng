<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    // Profile
    Route::resource('profiles', App\Http\Controllers\ProfileController::class);
    // Route::resource('profiles', App\Http\Controllers\ProfileController::class)->middleware('verified');

    //Message Controller
    Route::controller(App\Http\Controllers\MessageController::class)->group(function () {
        Route::get('message/compose', 'compose')->name('msg_compose');
        Route::get('message/outbox', 'outbox')->name('msg_outbox');
        Route::get('message/inbox', 'inbox')->name('msg_inbox');
        Route::get('message/outbox/{id}', 'show_outbox')->name('show_outbox');
        Route::get('message/inbox/{id}', 'show_inbox')->name('show_inbox');
        Route::post('message/send', 'send')->name('msg_send');
    });

    //Email Controller
    Route::resource('emails', App\Http\Controllers\EmailLogController::class);

    // Users
    Route::get('user/status/{id}', [App\Http\Controllers\UserController::class, 'status'])->name('userStatus');
    Route::get('users/get_users/{user_type}', [App\Http\Controllers\UserController::class, 'get_users'])->name('get_users.user');
    Route::get('users/account/{user_type}', [App\Http\Controllers\UserController::class, 'index'])->name('get_users.account');
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::middleware(['admin'])->group(function () {
        // School Session
        Route::resource('academic_years', App\Http\Controllers\AcademicYearController::class);
        // Programmes/ Classes
        Route::resource('classes', App\Http\Controllers\ClassController::class);
        // Divide/Faculties/College
        Route::resource('divides', App\Http\Controllers\DivideController::class);
        // Applicant
        Route::get('applicants/year/{year}', [App\Http\Controllers\ApplicantController::class, 'index'])->name('applicants.index');
        Route::resource('applicants', App\Http\Controllers\ApplicantController::class);


    });

    Route::middleware(['superAdmin'])->group(function () {
        // Settings
        Route::controller(App\Http\Controllers\SettingController::class)->group(function () {
            Route::get('change_session/{session_id}', 'change_session')->name('change_session');
            Route::get('general_settings', 'settings')->name('general_settings');
            Route::post('general_settings', 'general_settings')->name('general_settings_store');
            Route::post('setting/upload/logo', 'logo')->name('upload_logo');
            Route::post('setting/upload/stamp', 'stamp')->name('upload_stamp');
            Route::post('setting/upload/favicon', 'favicon')->name('upload_favicon');
            Route::get('backup_database', 'backup_database')->name('db.backup');
        });
        // SoftDeletes
        Route::get('divides/archived', [App\Http\Controllers\DivideController::class, 'archived'])->name('divides.archived');
        Route::get('divides/restore/{id}', [App\Http\Controllers\DivideController::class, 'restore'])->name('divides.restore');
        Route::delete('divides/delete/{id}', [App\Http\Controllers\DivideController::class, 'delete'])->name('divides.delete');
        Route::get('classes/archive', [App\Http\Controllers\ClassController::class, 'archivedClass'])->name('classes.archived');
        Route::get('classes/restore/{id}', [App\Http\Controllers\ClassController::class, 'restoreClass'])->name('classes.restore');
        Route::delete('classes/delete/{id}', [App\Http\Controllers\ClassController::class, 'deleteClass'])->name('classes.delete');
        Route::get('applicant/archived', [App\Http\Controllers\ApplicantController::class, 'archived'])->name('applicants.archived');
        Route::get('applicant/restore/{id}', [App\Http\Controllers\ApplicantController::class, 'restore'])->name('applicants.restore');
        Route::delete('applicant/delete/{id}', [App\Http\Controllers\ApplicantController::class, 'delete'])->name('applicants.delete');
    });

    Route::middleware(['applicant'])->group(function () {
        Route::controller(App\Http\Controllers\User\ApplicantController::class)->group(function () {
            Route::get('/applicant', 'index')->name('applicant.index');
            Route::get('/applicant/{user}/edit', 'edit')->name('my.application.edit');
            Route::get('/applicant/{user}/show', 'show')->name('my.application.show');
            Route::post('/applicant/{user}/update', 'update')->name('my.application.update');
        });
    });
});


