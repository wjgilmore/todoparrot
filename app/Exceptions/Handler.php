<?php 

namespace Todoparrot\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		AuthorizationException::class,
		HttpException::class,
		ModelNotFoundException::class,
		ValidationException::class,
	];

	/**
	 * Throw a 404 is a model record isn't found
	 * @param  ModelNotFoundException
	 * @return [type]
	 */
    protected function renderModelNotFoundException(ModelNotFoundException $e)
    {
      if (view()->exists('errors.404'))
      {
        return response()->view('errors.404', [], 404);
      }
      else
      {
        return (new SymfonyDisplayer(config('app.debug')))
          ->createResponse($e);
      }
    }

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
      if ($this->isHttpException($e))
      {
        return $this->renderHttpException($e);
      }
      elseif ($e instanceof ModelNotFoundException)
      {
        return $this->renderModelNotFoundException($e);
      }
      else
      {
        return parent::render($request, $e);
      }
	}

}
