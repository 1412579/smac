<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('des', function(Blueprint $table)
		{
			$table->increments('idDe');
			$table->string('TenDe');
			$table->integer('idBoDe')->unsigned();
			$table->foreign('idBoDe')->references('idBoDe')->on('bo_des')->onDelete('cascade');
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
		Schema::drop('des');
	}

}
