<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_satuan')->insert([
            ['satuan' => 'kg'],
            ['satuan' => 'karung'],
            ['satuan' => 'liter'],
        ]);
    }
}
