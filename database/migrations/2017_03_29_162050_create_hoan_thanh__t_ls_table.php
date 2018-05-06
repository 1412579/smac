<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoanThanhTLsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hoanthanh_tls', function(Blueprint $table)
		{
			$table->increments('idHTTL');
			$table->integer('idNhom')->unsigned();
			$table->foreign('idNhom')->references('idNhom')->on('teams')->onDelete('cascade');
			$table->integer('idTL')->unsigned();
			$table->foreign('idTL')->references('idTL')->on('ch_tls')->onDelete('cascade');
			$table->integer('idDe')->unsigned();
			$table->foreign('idDe')->references('idDe')->on('des')->onDelete('cascade');
			$table->string('CauTL');
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
		Schema::drop('hoanthanh_tls');
	}

}
