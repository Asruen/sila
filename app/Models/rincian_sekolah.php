<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rincian_sekolah extends Model
{
    use HasFactory;
    // Nama tabel di database
    protected $table = 'rincian_sekolah';

    // Kolom yang bisa diisi
    protected $fillable = ['id', 'id_menu_harian', 'id_sekolah','jumlah_penerima','status'];

}
