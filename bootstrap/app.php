<?php

<<<<<<< HEAD
=======
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PatientMiddleware;
>>>>>>> 22ae4e9a2a3c5770754365515ea942f132985fb9
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
<<<<<<< HEAD
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
=======
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'patientMiddleware' => PatientMiddleware::class,
            'adminMiddleware' => AdminMiddleware::class,
        ]);
>>>>>>> 22ae4e9a2a3c5770754365515ea942f132985fb9
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
