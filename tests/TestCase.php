<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    protected $baseUrl = 'http://localhost';

    public function setUp()
    {
      parent::setUp();
      Artisan::call('migrate');

    }

    public function tearDown()
    {
      parent::setUp();
      Artisan::call('migrate:reset');

    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

}
