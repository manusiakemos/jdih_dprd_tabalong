<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Arsip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->bigIncrements('arsip_id');
            $table->integer('category_id');
            $table->string('arsip_name');
            $table->string('arsip_nomor');
            $table->text('arsip_desc')->nullable();
            $table->year('arsip_tahun');
            $table->string('arsip_filename');
            $table->boolean('arsip_tampil')->default(1);
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
