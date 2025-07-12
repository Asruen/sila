<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaraMasak extends Model
{
    use HasFactory;

    protected $table = 'tb_cara_masak';

    protected $fillable = [
        'id_menu',
        'durasi',
        'keterangan_menu',
    ];

    // In CaraMasak model
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
