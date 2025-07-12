<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMasterBahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_master_bahan', function (Blueprint $table) {
            $table->id();
            $table->string('bahan', 30); // Kolom bahan
            $table->float('gramasi', 10, 2); // Kolom gramasi dengan format float
            $table->unsignedBigInteger('satuan_gudang'); // Foreign key ke tb_satuan
            $table->unsignedBigInteger('satuan_bahan'); // Foreign key ke tb_satuan
            $table->timestamps(); // Set foreign key untuk 'satuan_gudang' dan 'satuan_bahan'
            $table->foreign('satuan_gudang')->references('id')->on('tb_satuan')->onDelete('cascade');
            $table->foreign('satuan_bahan')->references('id')->on('tb_satuan')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_master_bahan');
    }
}
