<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            // if ($exception instanceof NotFoundHttpException) {
            if ($exception->getStatusCode() == 404) {
                $view = $request->is('admin/*') ? 'errors.admin.404' : 'errors.404';

                return response()->view($view, [], 404);
            }
            if ($exception->getStatusCode() == 500) {
                $view = $request->is('admin/*') ? 'errors.admin.500' : 'errors.500';

                return response()->view($view, [], 500);
            }
            if ($exception->getStatusCode() == 503) {
                $view = $request->is('admin/*') ? 'errors.admin.503' : 'errors.503';

                return response()->view($view, [], 503);
            }
        }

        return parent::render($request, $exception);
    }
}
