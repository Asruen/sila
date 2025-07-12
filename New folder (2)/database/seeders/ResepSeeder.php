<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resep;

class ResepSeeder extends Seeder
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
            [
                'resep' => 'resep 1',
                'karbohidrat' => 1, // nasi
                'protein' => 2,     // ikan goreng
                'sayur' => 3,       // lodeh
                'buah' => 4,        // pisang
                'susu' => 5,        // susu ultra uht coklat 600 ml
            ],
        ];

        foreach ($data as $item) {
            Resep::create($item);
        }
    }
}
