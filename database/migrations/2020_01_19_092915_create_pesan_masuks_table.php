<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pesan_kirim_id');
            $table->string('penerima');
            $table->string('pengirim');
            $table->integer('anonim');
            $table->text('subject')->nullable();
            $table->text('isi')->nullable();
            $table->string('status')->nullable();
            $table->integer('arsip');
            $table->integer('bintang');
            $table->integer('baca');
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
        Schema::dropIfExists('pesan_masuks');
    }
}
