<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanDapur extends Model
{
    use HasFactory;

    protected $table = 'tb_pengajuan_dapur';

    protected $fillable =
    [
        'nomor_dapur',
        'status',
        'keterangan',
    ];
}
