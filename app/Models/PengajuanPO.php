<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPO extends Model
{
    use HasFactory;

    protected $table = 'tb_pengajuan_po';

    protected $fillable =
    [
        'nomor_pengajuan',
        'total_pengajuan',
        'status',
        'keterangan',
    ];
}
