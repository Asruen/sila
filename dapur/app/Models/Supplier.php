<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'tb_supplier';

    protected $fillable = [
        'nama_supplier',
        'jenis_supplier',
        'no_telp',
        'alamat_supplier',
        'nama_PIC',
    ];

    public function bahan()
    {
        return $this->belongsTo(TbMasterBahan::class, 'jenis_supplier', 'id');
    }
}
