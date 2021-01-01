<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('siswa_id')->unsigned();
            $table->string('semester');
            $table->string('b_indo');
            $table->string('b_inggris');
            $table->string('mtk');
            $table->string('pkn');
            //migration value peminatan
            $table->string('sejarah')->nullable();
            $table->string('sosio')->nullable();
            $table->string('fisika')->nullable();
            $table->string('kimia')->nullable();
            $table->string('tafsir')->nullable();
            $table->string('qurdis')->nullable();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');

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
        Schema::dropIfExists('nilais');
    }
}
