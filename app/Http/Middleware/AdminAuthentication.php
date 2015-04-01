<?php namespace Todoparrot\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class AdminAuthentication {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function handle($request, Closure $next)
	{
		if ($this->auth->check())
		{
			if ($this->auth->user()->is_admin == true)
			{
				return $next($request);
			}
		}

		return new RedirectResponse(url('/'));

	}

} 