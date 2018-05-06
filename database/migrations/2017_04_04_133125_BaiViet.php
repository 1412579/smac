<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaiViet extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bai_viets', function(Blueprint $table)
		{
			$table->increments('idBV');
			$table->integer('idNhom')->unsigned();
			$table->foreign('idNhom')->references('id')->on('teams')->onDelete('cascade');
			$table->string('slug');
			$table->string('title');
			$table->string('headline');
			$table->string('thumbnail');
			$table->string('content');
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
		Schema::drop('bai_viets');
	}
}
