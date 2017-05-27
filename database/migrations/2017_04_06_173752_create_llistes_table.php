<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLlistesTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('llistes', function (Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('active')->default(1);
			$table->string('title');
			$table->integer('owner')->unsigned();
			$table->dateTime('event_date');
			$table->string('location')->nullable();
			$table->longText('description')->nullable();
			$table->timestamps();
			$table->foreign('owner')->references('id')->on('users');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('llistes');
	}
}
