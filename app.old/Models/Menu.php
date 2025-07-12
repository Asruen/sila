<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // Nama tabel di database
    protected $table = 'tb_menu';

    // Kolom yang bisa diisi
    protected $fillable = ['menu', 'karbohidrat', 'protein', 'sayur', 'buah', 'susu', 'nama_pengaju', 'tanggal_pengajuan', 'tanggal_kirim', 'nama_acc', 'tanggal_acc', 'status_pengajuan','nomor_pengajuan'];

    // Relasi: setiap resep memiliki satu karbohidrat
    public function karbohidrat()
    {
        return $this->belongsTo(Menu::class, 'karbohidrat');
    }

    // Relasi: setiap resep memiliki satu protein
    public function protein()
    {
        return $this->belongsTo(Menu::class, 'protein');
    }

    // Relasi: setiap resep memiliki satu sayur
    public function sayur()
    {
        return $this->belongsTo(Menu::class, 'sayur');
    }

    // Relasi: setiap resep memiliki satu buah
    public function buah()
    {
        return $this->belongsTo(Menu::class, 'buah');
    }

    // Relasi: setiap resep memiliki satu susu
    public function susu()
    {
        return $this->belongsTo(Menu::class, 'susu');
    }
}
