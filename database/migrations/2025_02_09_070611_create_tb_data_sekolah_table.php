<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDataSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->unsignedBiginteger('jenjang_sekolah');
            $table->integer('jumlah_siswa');
            $table->string('alamat_sekolah');
            $table->string('id_dapur');
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
        Schema::dropIfExists('tb_data_sekolah');
    }
}
