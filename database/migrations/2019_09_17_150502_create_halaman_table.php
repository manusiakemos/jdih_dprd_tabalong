<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHalamanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('halaman', function(Blueprint $table)
		{
			$table->increments('hal_id');
			$table->string('hal_url')->default('');
			$table->string('hal_judul')->default('');
			$table->text('hal_isi', 65535);
			$table->boolean('hal_aktif');
			$table->boolean('hal_custom');
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
		Schema::drop('halaman');
	}

}
