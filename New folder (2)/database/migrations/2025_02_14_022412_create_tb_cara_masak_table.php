<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCaraMasakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cara_masak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_menu');
            $table->string('durasi');
            $table->string('keterangan_menu');
            $table->timestamps();
            $table->foreign('id_menu')->references('id')->on('tb_menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cara_masak');
    }
}
