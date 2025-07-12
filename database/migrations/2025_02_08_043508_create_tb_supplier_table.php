<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->unsignedBigInteger('jenis_supplier');
            $table->integer('no_telp');
            $table->string('alamat_supplier');
            $table->string('nama_PIC');
            $table->timestamps();
            $table->foreign('jenis_supplier')->references('id')->on('tb_master_bahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_supplier');
    }
}
