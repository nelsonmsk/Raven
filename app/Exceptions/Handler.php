<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            
        });
    }
	
	public function render($request, Throwable $e)
	{
		 //check if exception is an instance of ModelNotFoundException.
		 if ($e instanceof ModelNotFoundException)
			 {
			 // ajax 404 json feedback
			 if ($request->ajax())
			 {
			 return response()->json(['error' => 'Not Found'], 404);
			 }
			 // normal 404 view page feedback
			 return response()->view('errors.404', [], 404);
			 }
		//check if exception is an instance of AuthenticationException.
		 if ($e instanceof AuthenticationException)
			 {
				return response()->view('login'); 
			 }
		return parent::render($request, $e);
		 
	}
}
