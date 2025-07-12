<?php

namespace App\Exports;

use App\Models\DataSekolah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;
use Carbon\Carbon;
class SekolahExport implements FromCollection, WithHeadings, WithStyles, WithCustomStartCell, WithMapping
{
    protected $start_date;
    protected $end_date;

    // Terima input tanggal dari controller
    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        $start_datea = Carbon::parse($this->start_date)->subDay(); // Kurangi 1 hari
        $end_datea = Carbon::parse($this->end_date)->addDay(); // Tambah 1 hari
        return DataSekolah::with('tingkatanSekolah')
            ->whereBetween('created_at', [$start_datea, $end_datea])
            ->get();
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Sekolah',
            'Jenjang Sekolah',
            'Jumlah Siswa',
            'Alamat Sekolah',
            'No Dapur',
        ];
    }

    public function map($Sekolah): array
    {
        return [
            $Sekolah->id,
            $Sekolah->nama_sekolah,
            $Sekolah->tingkatanSekolah->jenjang_sekolah ?? 'Tidak Ada',
            $Sekolah->jumlah_siswa,
            $Sekolah->alamat_sekolah,
            $Sekolah->id_dapur,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getBorders()->getAllBorders()->setBorderStyle('thin');
        $lastRow = count($this->collection()) + 2;

        // Tambahkan tanda tangan
        $sheet->setCellValue('C' . ($lastRow + 2), "Disetujui oleh,");
        $sheet->setCellValue('C' . ($lastRow + 5), "Kepala Dapur");
    }
}
