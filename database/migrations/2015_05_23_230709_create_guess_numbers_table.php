<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuessNumbersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guess_numbers', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('game_id');
                        $table->integer('guess_number');
                        $table->integer('bulls');
                        $table->integer('cows');
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
		Schema::drop('guess_numbers');
	}

}
