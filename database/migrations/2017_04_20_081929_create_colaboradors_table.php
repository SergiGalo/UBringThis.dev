<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradorsTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('colaboradors', function (Blueprint $table)
		{
			$table->integer('list_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->unique(['list_id', 'user_id']);
			$table->foreign('list_id')->references('id')->on('llistes');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('colaboradors');
	}
}
