<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ompreng extends Model
{
    use HasFactory;

    protected $table = 'omprengs';

    protected $fillable = [
        'nomor_dapur',
        'tanggal',
        'line1',
        'line2',
        'line3',
        'line4',
        'line5',
        'line6',
    ];

    //public $timestamps = false; // nonaktifkan jika tidak pakai kolom created_at & updated_at
}
