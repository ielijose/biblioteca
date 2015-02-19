<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prestamos', function($table)
		{
			$table->increments('id');

			$table->integer('student_id')->unsigned();
			$table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

			$table->integer('book_id')->unsigned();
			$table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');	

			$table->enum('status', ['on', 'off'])->default('on');
					
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
		Schema::drop('prestamos');
	}

}
