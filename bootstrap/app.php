<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Applicant;
use App\Http\Middleware\SuperAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => Admin::class,
        'superAdmin' => SuperAdmin::class,
        'applicant' => Applicant::class,
        // 'teacher' => App\Http\Middleware\Teacher::class,
        // 'student' => App\Http\Middleware\Student::class,
        // 'Image' => Intervention\Image\Facades\Image::class,
        // 'Excel' => Maatwebsite\Excel\Facades\Excel::class
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
