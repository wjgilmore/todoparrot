<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// Seed the categories table

		DB::table('categories')->delete();

		$this->call('Todoparrot\CategoryTableSeeder');

		// Seed the 

	}

}
