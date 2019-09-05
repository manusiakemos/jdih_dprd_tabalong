<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArsipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arsip', function(Blueprint $table)
		{
			$table->bigInteger('arsip_id', true)->unsigned();
			$table->integer('cat_id');
			$table->integer('user_id')->nullable();
			$table->text('arsip_slug', 65535)->nullable();
			$table->string('arsip_title')->default('');
			$table->string('arsip_nomor');
			$table->string('arsip_url', 190)->nullable();
			$table->integer('arsip_hits')->nullable();
			$table->text('arsip_desc', 65535)->nullable();
			$table->date('arsip_date')->nullable();
			$table->year('arsip_tahun');
			$table->string('arsip_filename');
			$table->boolean('arsip_tampil')->default(1);
			$table->softDeletes();
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
		Schema::drop('arsip');
	}

}
