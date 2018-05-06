<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoanThanhTNsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hoanthanh_tns', function(Blueprint $table)
		{
			$table->increments('idHTTN');
			$table->integer('idNhom')->unsigned();
			$table->foreign('idNhom')->references('idNhom')->on('teams')->onDelete('cascade');
			$table->integer('idTN')->unsigned();
			$table->foreign('idTN')->references('idTN')->on('ch_tns')->onDelete('cascade');
			$table->integer('idDe')->unsigned();
			$table->foreign('idDe')->references('idDe')->on('des')->onDelete('cascade');
			$table->tinyInteger('DapAnLC');
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
		Schema::drop('hoanthanh_tns');
	}

}
