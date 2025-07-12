<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 


class Ompreng extends Model
{
    use HasFactory;

    protected $table = 'tb_penerima_ompreng';
    public $timestamps = false; 
    protected $fillable = [
        'nomor_dapur', 
        'tanggal_update',
        'line1',
        'line2',
        'line3',
        'line4',
        'line5',
        'line6', 
    ];

    protected $casts = [
        'line1' => 'integer',
        'line2' => 'integer',
        'line3' => 'integer',
        'line4' => 'integer',
        'line5' => 'integer',
        'line6' => 'integer', 
        'tanggal_update' => 'datetime', 
    ];

    protected $appends = ['line_total'];

    public function getLineTotalAttribute()
    {
        return ($this->line1 ?? 0) +
               ($this->line2 ?? 0) +
               ($this->line3 ?? 0) +
               ($this->line4 ?? 0) +
               ($this->line5 ?? 0) +
               ($this->line6 ?? 0);
    }
}
