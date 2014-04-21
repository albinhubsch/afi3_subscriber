<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSubscribers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribers', function($table)
		{
			$table->increments('id');

			// Specifics for this table
			$table->integer('subscription_number');
			$table->string('email', 256);
			$table->string('password', 256);
			$table->string('personal_number', 12);
			$table->string('firstname', 128);
			$table->string('lastname', 128);
			$table->string('adress', 512);
			$table->string('zip_code', 16);
			$table->string('city', 128);
			$table->string('country', 128);

			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subscribers');
	}

}
