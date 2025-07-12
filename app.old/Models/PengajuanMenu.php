<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMenu extends Model
{
    use HasFactory;

    protected $table = 'tb_pengajuan_menu';

    protected $fillable =
    [
        'nomor_dapur',
        'status',
        'keterangan',
    ];
}
