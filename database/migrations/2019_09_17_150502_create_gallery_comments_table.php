<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleryCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery_comments', function(Blueprint $table)
		{
			$table->increments('gc_id');
			$table->text('gc_text', 65535)->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('gal_id')->nullable();
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
		Schema::drop('gallery_comments');
	}

}
