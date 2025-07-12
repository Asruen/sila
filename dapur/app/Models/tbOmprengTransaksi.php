<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbOmprengTransaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_ompreng_transaksi';
    protected $fillable = [
       'tb_menu_id',
       'kode_rantang',
       'kode_ompreng',
       'user_id',
       'tanggal_keluar',
       'tanggal_masuk',
       'status'
    ];
}
