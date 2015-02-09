<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function($table)
		{
			$table->increments('id');

			$table->string('name');
			$table->string('ci');
			$table->string('section');
			$table->enum('gender', ['male','female']);					    
			$table->string('phone');
			$table->string('email');
			$table->string('address');	
					
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
		Schema::drop('students');
	}

}
