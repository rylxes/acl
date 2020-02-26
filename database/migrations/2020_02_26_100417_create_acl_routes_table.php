<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAclRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acl_routes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('routes', 191)->nullable();
			$table->string('action', 191)->nullable();
			$table->string('namespace', 191)->nullable();
			$table->string('prefix', 191)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('acl_routes');
	}

}
