<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCHTNsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ch_tns', function(Blueprint $table)
		{
			$table->increments('idTN');
			$table->integer('idDe')->unsigned();
			$table->foreign('idDe')->references('idDe')->on('des')->onDelete('cascade');
			$table->string('NoiDung');
			$table->string('DapAn1');
			$table->string('DapAn2');
			$table->string('DapAn3');
			$table->string('DapAn4');
			$table->tinyInteger('DapAnDung');
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
		Schema::drop('ch_tns');
	}

}
