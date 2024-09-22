<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use ProtoneMedia\Splade\SpladeCore;
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
        $this->renderable(SpladeCore::exceptionHandler($this));

        $this->reportable(function (Throwable $e) {
            //
        });
    }
//    public function render($request, Exception|Throwable $e)
//    {
//        // 404 Errors
//        // Either the route does not exist or a model is not found when performing an Eloquent query
//        if($e instanceof ValidationException) {
//            return responder()->error(message: $e->errorBag)->respond(422);
//        }
//
//        return parent::render($request, $e);
//    }
    protected function unauthenticated($request, AuthenticationException $exception): Response|JsonResponse|RedirectResponse
    {
        $message = [
            'status'  => 401,
            'success' => false,
            'data'    => [
                'message' => 'Unauthenticated.'
            ]
        ];

        return $this->shouldReturnJson($request, $exception)
            ? response()->json($message, 401)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }
}
