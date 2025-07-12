<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    // Nama tabel di database
    protected $table = 'tb_resep';

    // Kolom yang bisa diisi
    protected $fillable = ['id','nama_resep', 'id_komponen_sehat'];

    // Relasi: setiap menu terkait dengan satu komponen sehat
    public function komponenSehat()
    {
        return $this->belongsTo(KomponenSehat::class, 'id_komponen_sehat');
    }

    // Relasi: satu Menu bisa menjadi bagian dari banyak Resep
    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_menu');
    }

    public function menuBahan()
    {
        return $this->hasMany(MenuBahan::class, 'menu_id'); // Relasi balik dari Menu ke MenuBahan
    }
}
