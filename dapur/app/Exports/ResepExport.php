<?php
namespace App\Exports;

use App\Models\Resep;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class ResepExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        $start_datea = Carbon::parse($this->start_date)->subDay(); // Kurangi 1 hari
        $end_datea = Carbon::parse($this->end_date)->addDay(); // Tambah 1 hari
        return Resep::with('komponenSehat')
            ->whereBetween('created_at', [$start_datea, $end_datea])
            ->get();
    }

    public function headings(): array
    {
        return ['No', 'Nama Resep', 'Komponen Sehat'];
    }

    public function map($resep): array
    {
        return [
            $resep->id,
            $resep->nama_resep,
            $resep->komponenSehat->komponen ?? 'Tidak Ada'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:C1')->getFont()->setBold(true);
        $sheet->getStyle('A1:C1')->getBorders()->getAllBorders()->setBorderStyle('thin');
        $lastRow = count($this->collection()) + 2;

        // Tambahkan tanda tangan
        $sheet->setCellValue('C' . ($lastRow + 2), "Disetujui oleh,");
        $sheet->setCellValue('C' . ($lastRow + 5), "Kepala Dapur");
    }
}
