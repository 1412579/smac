<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhViensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('thanh_viens', function(Blueprint $table)
		{
			$table->increments('idTV');
			$table->integer('idNhom')->unsigned();
			$table->foreign('idNhom')->references('idNhom')->on('teams')->onDelete('cascade');
			$table->string('MSSV');
			$table->string('HoTen');
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
		Schema::drop('thanh_viens');
	}

}

