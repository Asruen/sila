<?php


use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;


return new class extends Migration

{

/**

* Run the migrations.

*/

public function up(): void

{

Schema::table('tb_penerima_bahan', function (Blueprint $table) {

// Menambahkan kolom 'jumlah_datang' setelah 'nama_supplier'

$table->integer('jumlah_datang')->after('nama_supplier');

$table->timestamp('tanggal_jam')->after('jumlah_datang')->nullable(); // <<< Tambahkan ->nullable()

});

}


/**

* Reverse the migrations.

*/

public function down(): void

{

Schema::table('tb_penerima_bahan', function (Blueprint $table) {

// Untuk rollback, hapus kolom yang telah ditambahkan

$table->dropColumn('jumlah_datang');

$table->dropColumn('tanggal_jam');

});

}

};
