<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetMatpelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_matpels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hari_id')->unsigned();
            $table->bigInteger('matpel_id')->unsigned();
            $table->bigInteger('kelas_id')->unsigned();
            $table->string('dari_jam');
            $table->string('sampai_jam');
            $table->timestamps();

            $table->foreign('hari_id')->references('id')->on('hari')->onDelete('cascade');
            $table->foreign('matpel_id')->references('id')->on('matpels')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');

            $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_matpels');
    }
}
