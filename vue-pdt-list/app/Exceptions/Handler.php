<?php

namespace App\Exceptions;

use App\Exceptions\ExceptionTrait;
use Exception;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//Use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    use ExceptionTrait;

    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
      if( $request->expectsJson() ){

        return $this->apiException($request,$exception);

      }



      return parent::render($request, $exception);
    }
}