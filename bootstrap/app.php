<?php

use Illuminate\Foundation\Application;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            // this key is your middleware “name”:
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
     ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (AuthenticationException $e, $request) {
            // 1) API requests → JSON 401
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Unauthenticated: invalid or missing token.',
                ], 401);
            }

            // 2) Admin panel → redirect to admin login
            if ($request->is('admin/*')) {
                return redirect()->guest(route('admin.login'));
            }

            // 3) Anything else → redirect home (or define a 'login' route)
            return redirect()->guest(url('/'));
        });
    })
    ->create();
