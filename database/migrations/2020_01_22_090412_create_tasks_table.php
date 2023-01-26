<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('project_id');
            $table->string('task');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->date('tanggal');
            $table->integer('type')->nullable()->default(1);
            $table->integer('durasi')->nullable()->default(0);
            $table->integer('id_parent')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->integer('delay')->nullable()->default(0);
            $table->integer('status_check')->nullable()->default(0);
            $table->integer('problem')->nullable();
            $table->integer('status_problem')->nullable()->default(1);
            $table->integer('type_problem')->nullable()->default(0);
            $table->text('counter')->nullable();
            $table->text('measer')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
