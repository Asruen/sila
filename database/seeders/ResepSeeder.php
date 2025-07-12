<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resep;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['nama_resep' => 'nasi', 'id_komponen_sehat' => 1],
            ['nama_resep' => 'ikan goreng', 'id_komponen_sehat' => 2],
            ['nama_resep' => 'lodeh', 'id_komponen_sehat' => 3],
            ['nama_resep' => 'pisang', 'id_komponen_sehat' => 4],
            ['nama_resep' => 'susu ultra uht coklat 600 ml', 'id_komponen_sehat' => 5],
        ];

        foreach ($data as $item) {
            Resep::create($item);
        }
    }
}
