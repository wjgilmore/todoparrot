<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTodolistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('todolists', function(Blueprint $table)
		{
	        $table->integer('user_id')->unsigned()->nullable()->after('id');
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('todolists', function(Blueprint $table)
		{
	        $table->dropForeign('todolists_user_id_foreign');
	        $table->dropColumn('user_id');
		});
	}

}
