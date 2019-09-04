<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeritaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('berita', function(Blueprint $table)
		{
			$table->increments('berita_id');
			$table->integer('user_id');
			$table->integer('cb_id');
			$table->boolean('berita_aktif');
			$table->string('berita_judul')->default('');
			$table->string('berita_url')->default('');
			$table->string('berita_gambar')->default('');
			$table->text('berita_isi', 65535);
			$table->integer('berita_hit');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('berita');
	}

}
