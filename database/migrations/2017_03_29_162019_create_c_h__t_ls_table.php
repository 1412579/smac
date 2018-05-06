<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCHTLsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ch_tls', function(Blueprint $table)
		{
			$table->increments('idTL');
			$table->integer('idDe')->unsigned();
			$table->foreign('idDe')->references('idDe')->on('des')->onDelete('cascade');
			$table->string('NoiDung');
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
		Schema::drop('ch_tls');
	}

}
