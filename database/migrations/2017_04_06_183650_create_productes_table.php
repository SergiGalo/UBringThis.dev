<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductesTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('productes', function (Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('active')->default(1);
			$table->integer('list_id')->unsigned();
			$table->boolean('confirmed')->default(0);
			$table->string('name')->required();
			$table->decimal('quantity', 5, 2)->nullable();
			$table->string('units')->nullable();
			$table->decimal('price', 5, 2)->nullable();
			$table->integer('assigned_to')->nullable()->unsigned();
			$table->timestamps();
			$table->foreign('list_id')->references('id')->on('llistes');
			$table->foreign('assigned_to')->references('id')->on('users');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('productes');
	}
}
