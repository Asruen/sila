<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbOmprengTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ompreng', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_dapur');
            $table->unsignedBigInteger('rantang_id');
            $table->string('qr_code');
            $table->enum('status', ['Didapur','Diluar']);
            $table->timestamps();
            $table->foreign('rantang_id')->references('id')->on('tb_rantang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ompreng');
    }
}
