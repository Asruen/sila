<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

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
            ['nama_menu' => 'nasi', 'id_komponen_sehat' => 1],
            ['nama_menu' => 'ikan goreng', 'id_komponen_sehat' => 2],
            ['nama_menu' => 'lodeh', 'id_komponen_sehat' => 3],
            ['nama_menu' => 'pisang', 'id_komponen_sehat' => 4],
            ['nama_menu' => 'susu ultra uht coklat 600 ml', 'id_komponen_sehat' => 5],
        ];

        foreach ($data as $item) {
            Menu::create($item);
        }
    }
}
