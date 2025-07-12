<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBahan extends Model
{
    use HasFactory;
    protected $table = 'tb_penerima_bahan';

    // Tentukan kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'id',
        'nama_bahan',
        'jumlah',
        'jumlah_datang',
        'tanggal_jam',
    ];

    /**
     * Relasi ke tabel tb_satuan untuk kolom satuan_gudang.
     */
    public function satuanGudang()
    {
        return $this->belongsTo(TbSatuan::class, 'satuan_gudang');
    }

    /**
     * Relasi ke tabel tb_satuan untuk kolom satuan_bahan.
     */
    public function satuanBahan()
    {
        return $this->belongsTo(TbSatuan::class, 'satuan_bahan');
    }
}
