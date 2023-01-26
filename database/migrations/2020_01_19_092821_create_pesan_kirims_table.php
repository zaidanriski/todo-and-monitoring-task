<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanKirimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_kirims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pengirim');
            $table->string('penerima');
            $table->integer('anonim');
            $table->text('subject')->nullable();
            $table->text('isi')->nullable();
            $table->string('status')->nullable();
            $table->integer('arsip');
            $table->integer('bintang');
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('pesan_kirims');
    }
}
