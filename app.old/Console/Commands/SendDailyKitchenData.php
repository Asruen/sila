<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use App\Models\Menu;
use App\Models\Resep;
use App\Models\rincian_menu_harian;
use App\Models\MenuBahan;
use App\Models\rincian_sekolah;
use App\Models\DataSekolah;
use App\Models\DataDapur;
use App\Models\TbPoBahan;
use App\Models\TingkatanSekolah;
use Illuminate\Support\Facades\DB;

class SendDailyKitchenData extends Command
{
    protected $signature = 'send:daily-kitchen-data';
    protected $description = 'Mengirim data harian dapur ke 3 API internal';

    public function handle()
    {
        $startTime = time();
        while (time() - $startTime < 60) { // jalan selama 1 menit
            $this->sendAllApis();
            sleep(10); // jeda 10 detik
        }
    }

    private function sendAllApis()
    {
        $tanggal = now()->toDateString();

        // API 1
        $api1Data = [
            "nomor_dapur" => "D132",
            "tanggal" => $tanggal,
            "jumlah_tk_sd_kls3" => "645",
            "jumlah_sd_kls4_sma" => "8343"
        ];
       // Http::post('http://10.8.0.14:8001/api/penerima-makan-gratis', $api1Data);

        // API 2
        $api2Data = [
            "data" => [
                [
                    "nomor_dapur" => "D1326",
                    "tanggal" => $tanggal,
                    "nama_bahan" => "Airq",
                    "jumlah" => "786",
                    "satuan" => "1",
                    "nama_supplier" => "Air Gunung"
                ],
                [
                    "nomor_dapur" => "D1326",
                    "tanggal" => $tanggal,
                    "nama_bahan" => "Minyak",
                    "jumlah" => "22",
                    "satuan" => "1",
                    "nama_supplier" => "Air Gunung"
                ]
            ]
        ];
        Http::post('http://10.8.0.14:8001/api/penerimaan-bahan', $api2Data);

        $tanggal = now()->format('Y-m-d');

        $menus = [
            [ // Data A
                "nomor_dapur" => "D1336",
                "tanggal" => $tanggal,
                "karbohidrat" => "Nasi",
                "protein" => "Ayam Bakar Mentega",
                "sayur" => "Capcay goreng",
                "buah" => "Pepaya goreng",
                "susu" => "Susu coklat"
            ],
            [ // Data B
                "nomor_dapur" => "D1337",
                "tanggal" => $tanggal,
                "karbohidrat" => "Mie",
                "protein" => "Telur Dadar",
                "sayur" => "Tumis Kangkung",
                "buah" => "Semangka",
                "susu" => "Susu putih"
            ],
            [ // Data C
                "nomor_dapur" => "D1338",
                "tanggal" => $tanggal,
                "karbohidrat" => "Lontong",
                "protein" => "Tempe Orek",
                "sayur" => "Sayur lodeh",
                "buah" => "Pisang",
                "susu" => "Susu vanilla"
            ],
            // Tambah data D, E, F sesuai kebutuhan
        ];

        /*foreach ($menus as $key => $menuData) {
            try {
                $response = Http::post('http://10.8.0.14:8001/api/menu-hari-ini', $menuData);
               
            } catch (\Exception $e) {
               
            }

            sleep(1); // Tunggu 1 detik sebelum kirim berikutnya
        }

       

        $this->info("Data dikirim pada " . now());*/


        $today = date('Y-m-d');
        $dataPertama = DataDapur::first(); // Mengambil satu data paling pertama berdasarkan primary key (biasanya 'id')
        $menu = Menu::where('tanggal_kirim', date('Y-m-d'))->first();

        $bahanMasukList = DB::table('tb_po_bahan')
            ->join('tb_master_bahan', 'tb_po_bahan.id_bahan', '=', 'tb_master_bahan.id')
            ->join('tb_satuan', 'tb_master_bahan.satuan_bahan', '=', 'tb_satuan.id')
            ->select(
                'tb_po_bahan.tanggal_kedatangan',
                'tb_master_bahan.bahan',
                'tb_po_bahan.jumlah_bahan',
                'tb_satuan.satuan',
            )
            ->whereDate('tb_po_bahan.tanggal_kedatangan', $menu->tanggal_kirim)
            ->get();
        $api2Data = [
            'data' => $bahanMasukList->map(function ($item) use ($dataPertama) {
                return [
                    'nomor_dapur' => $dataPertama->nama_dapur,
                    'tanggal' => date('Y-m-d'),
                    'nama_bahan' => $item->bahan,
                    'jumlah' => (string)  $item->jumlah_bahan,
                    'satuan' => $item->satuan,
                    'nama_supplier' => 'koperasi',
                ];
            })->toArray()
        ];

        $response = Http::withHeaders([

            'Content-Type' => 'application/json',
        ])->post('http://10.8.0.14:8001/api/penerimaan-bahan', $api2Data);
        $this->info("API 2 Response: " . $response->status());
    }
}
