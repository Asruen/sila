<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDataDapurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_dapur', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dapur');
            $table->string('alamat_dapur');
            $table->integer('nomor_dapur');
            $table->integer('kota');
            $table->integer('provinsi');
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
        Schema::dropIfExists('tb_data_dapur');
    }
}