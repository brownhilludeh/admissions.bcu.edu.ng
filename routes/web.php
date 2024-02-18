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
    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Academic Year
    Route::resource('academic_years', App\Http\Controllers\AcademicYearController::class);
    // Settings
    // Route::get('change_session/{session_id}', [App\Http\Controllers\SettingController::class, 'change_session']);
    Route::get('general_settings', [App\Http\Controllers\SettingController::class, 'settings'])->name('general_settings');
    Route::post('general_settings', [\App\Http\Controllers\SettingController::class, 'general_settings'])->name('general_settings');
    // Route::post('setting/upload/logo', [\App\Http\Controllers\SettingController::class, 'logo'])->name('upload_logo');
    // Route::post('setting/upload/stamp', [\App\Http\Controllers\SettingController::class, 'stamp'])->name('upload_stamp');
    // Route::get('backup_database', [\App\Http\Controllers\SettingController::class, 'backup_database'])->name('db.backup');
});
