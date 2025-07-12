<?php

namespace App\Exports;

use App\Models\TbSatuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class SatuanExport implements FromCollection, WithHeadings, WithStyles, WithCustomStartCell, WithMapping
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
        $start_datea = Carbon::parse($this->start_date)->subDay();
        $end_datea = Carbon::parse($this->end_date)->addDay();
        $Satuans = Satuan::whereBetween('created_at', [$this->start_datea, $this->end_datea])
            ->select('satuan')
            ->get();

        // Menambahkan nomor urut secara manual
        return new Collection($Satuans->map(function ($item, $index) {
            return [
                'no' => $index + 1,
                'satuan' => $item->satuan,
            ];
        }));
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function headings(): array
    {
        return [
            'No',
            'Satuan',
        ];
    }

    public function map($satuan): array
    {
        return [
            $satuan['no'],
            $satuan['satuan'],
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
