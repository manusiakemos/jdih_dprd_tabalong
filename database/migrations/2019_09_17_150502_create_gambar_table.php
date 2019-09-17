<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGambarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gambar', function(Blueprint $table)
		{
			$table->increments('gb_id');
			$table->string('gb_nama')->default('');
			$table->string('gb_folder')->default('');
			$table->string('gb_tipe')->default('');
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
		Schema::drop('gambar');
	}

}
