<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMenuBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_menu_bahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('bahan_id');
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_satuan');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('tb_menu');
            $table->foreign('bahan_id')->references('id')->on('tb_master_bahan');
            $table->foreign('id_satuan')->references('id')->on('tb_satuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_menu_bahan');
    }
}
