<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenerimaanOmpreng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('tb_penerima_ompreng', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_dapur', 30);
        $table->datetime('tanggal_update');
        $table->string('nama');
        $table->integer('line1')->default(0);
        $table->integer('line2')->default(0);
        $table->integer('line3')->default(0);
        $table->integer('line4')->default(0);
        $table->integer('line5')->default(0);
        $table->integer('line6')->default(0);
        $table->integer('total')->default(0);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_penerima_ompreng');
    }
}
