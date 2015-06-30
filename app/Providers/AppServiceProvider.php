<?php namespace Todoparrot\Providers;

use Illuminate\Support\ServiceProvider;
// use Event;
// use Todoparrot\Events\ListWasCreated;
// use Todoparrot\Todolist;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Todolist::created(function ($list) {
        //   Event::fire(new ListWasCreated($list));
        // });
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'Todoparrot\Services\Registrar'
		);
	}

}
