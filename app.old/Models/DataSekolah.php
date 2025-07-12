<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSekolah extends Model
{
    use HasFactory;

    protected $table = 'tb_data_sekolah';

    protected $fillable = [
        'id',
        'nama_sekolah',
        'jenjang_sekolah',
        'jumlah_siswa',
        'alamat_sekolah',
        'id_dapur',
    ];

    public function tb_data_dapur()
    {
        return $this->belongsTo(DataDapur::class, 'nama_dapur', 'id');
    }

    public function tingkatanSekolah()
    {
        return $this->belongsTo(TingkatanSekolah::class, 'jenjang_sekolah', 'id');
    }
}
