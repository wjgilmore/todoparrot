<?php namespace Todoparrot\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class ListOwnershipMiddleware {

	protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		// This really seems clumsy. Is there a better
		// way to do this? Bueller, Bueller?
		$listId = app()->router->getCurrentRoute()->getParameter('lists');

		if (! $this->auth->user()->owns($listId))
		{
			return \Redirect::route('home')
            	->with('message', 'Authorization error: you do not own this list.');
		}

		return $next($request);
	
	}

}
