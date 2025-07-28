<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        //
    }

    /**
     * Customize the response for unauthenticated requests.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // If this is an API call, return JSON 401
        if ($request->expectsJson()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Unauthenticated: invalid or missing token.',
            ], 401);
        }

        // Otherwise redirect to admin login
        return redirect()->guest(route('admin.login'));
    }
}
