<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAclRouteRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acl_route_role', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('route_id')->nullable();
			$table->integer('role_id')->nullable();
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
		Schema::drop('acl_route_role');
	}

}
