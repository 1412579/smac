<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomDesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nhom_des', function(Blueprint $table)
		{
			$table->integer('idNhom')->unsigned();
			$table->foreign('idNhom')->references('idNhom')->on('teams')->onDelete('cascade');
			$table->integer('idDe')->unsigned();
			$table->foreign('idDe')->references('idDe')->on('des')->onDelete('cascade');
			$table->integer('ThoiGianHoanThanh');
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
		Schema::drop('nhom_des');
	}

}
